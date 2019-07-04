@extends('layouts.manage')

@section('content')
<div class="flex-container">
<div class="columns m-t-10">
    <div class="column">
<h1 class="title">Add New Blog Post</h1>
    </div>
    {{-- <div class="column">
    <a href="{{route('posts.store')}}" class="button is-pulled-right"> <i class="fa fa-user-plus">Create Posts</i></a>
    </div> --}}
</div>
<hr class="hor">
<form action="{{route('posts.store')}}" method="POST">
{{csrf_field()}}
<div class="columns">
    <div class="column is-three-quarters">
<b-field>
    <b-input type="text" placeholder="Post Title"
        size="is-large" v-model="title">
    </b-input>
</b-field>
<p>
<slug-widget url="{{url('/')}}" subdirectory="blog" :title="title" @slug-changed="updateSlug"></slug-widget>
</p>
<b-field>
    <b-input type="textarea"
        rows="30"
        placeholder="Compose">
    </b-input>
</b-field>
</div><!--end of column three-quarters-->

<div class="column is-one-quarter-desktop is-narrow-tablet">
<div class="card card-widget">

<div class="author-widget widget-area">
    <div class="selected-author">
    <img src="https://placehold.it/50x50"/>
    <div class="author">
        <h4>By: Statesman</h4>
        <p class="subtitle">
            (states man)
        </p>

    </div>
</div>
</div>
<div class="post-status-widget widget-area">
    <div class="status">
        <div class="status-icon">
<b-icon icon="assignment" size="is-medium"></b-icon>
        </div>
        <div class="status-details">
            <h4> <span class="status-emphasis">Draft</span> Saved</h4>
            <p>A few minutes Ago</p>
        </div>
    </div>
</div>
<div class="publish-buttons-widget widget-area">
<div class="secondary-action-button">
    <button class="button is-info is-outlined is-fullwidth">Save Draft</button>
</div>
<div class="primary-action-button">
    <button class="button is-primary is-fullwidth">Publish</button>
</div>
</div>
</div>
</div><!--end of the one quarter column-->
</div>
</form>





</div> 
{{-- This is the end of the flex-container --}}

@endsection
@section('script')
<script>
var app=new Vue({
el:'#app',
data:{
title:'',
slug:'',
api_token: '{{Auth::user()->api_token}}'
},
methods:{
  updateSlug:function(val){
this.slug=val;
  }

}

});


</script>
@endsection