<style scopped>
.slug-widget{
    display:flex;
    justify-content:flex-start;
    align-items:center;
    margin-bottom:15px;
}
.wrapper{
    margin-left:8px;
}
.slug{
    background-color:#fdfd96;
    padding: 3px 5px;
}
.slug-edit{
    width:auto;
}
.url-wrapper{
    height:30px;
    display:flex;
    align-items:center;
}
</style>


<template>
  <div class="slug-widget">
<div class="icon-wrapper wrapper">
    <i class="fa fa-link"></i>
</div>
<div class="url-wrapper wrapper">
    <span class="root-url">{{url}}</span
    ><span class="subdirectory-url">/{{subdirectory}}</span
    ><span class="slug" v-show="slug && !isEditing">/{{slug}}</span
    ><input type="text" name="slug-edit" class="input slug-edit is-small" v-show="isEditing" v-model="customSlug"/>
</div>
<div class="button-wrapper wrapper">
    <button class="button is-small" v-show="!isEditing" @click.prevent="editSlug">Edit</button>
        <button class="button is-small" v-show="isEditing" @click.prevent="saveSlug">Save</button>
          <button class="button is-small" v-show="isEditing" @click.prevent="resetSlug">Reset</button>
</div>
  </div>
</template>

<script>
    export default {
      props:{
          url:{
              type:String,
              required:true

          },
          subdirectory:{
type:String,
required:true
          },
          title:{
              type:String,
              required:true
          }
          },
          data:function(){
              return {
                  slug:this.setSlug(this.title),
                  isEditing:false,
                  customSlug: '',
                  wasEdited:false,
                  api_token: this.$root.api_token
              }
          },
          methods:{
            //   convertTitle:function(){
            //       return Slug(this.title)
            //   },
              editSlug:function(){
    this.customSlug=this.slug;
this.isEditing=true;
              },
              saveSlug:function(){
                  if(this.customSlug !== this.slug) this.wasEdited=true;
this.setSlug(this.customSlug);
this.$emit('save', this.slug);
this.isEditing=false;
              },
              resetSlug:function(){
                  //this.slug=this.convertTitle();
                  this.setSlug(this.title);
                  this.$emit('reset', this.slug);
                  this.wasEdited=false;
                  this.isEditing=false;
              },


              setSlug:function(newVal, count=0){
                  if(newVal==='') return '';
//sluggify the newval
let slug=Slug(newVal + (count> 0 ? `-${count}`:''));
let vm=this;
//test to see if its unique
if(this.api_token && slug)
{
axios.get('/api/posts/unique', {
    params:{
        api_token:vm.api_token,
        slug:slug
    }
}).then(function(response){
//if its unique then set the slug ad emit event 

if(response.data){
    vm.slug=slug;
    vm.$emit('slug-changed', slug)
              
}else{
//if not customize the slug to make it unique and test again
vm.setSlug(newVal, count+1 )

}
}).catch(function(error){
console.log(error);
});

}


              }
          },
          watch:{
              title: _.debounce(function(){
                 if(this.wasEdited ===false) this.setSlug(this.title);
              }, 500)
          }
      
        }
</script>
