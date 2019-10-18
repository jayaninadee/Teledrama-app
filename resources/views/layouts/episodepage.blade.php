<?php
/**
 * Created by IntelliJ IDEA.
 * User: Jayani
 * Date: 10/11/2019
 * Time: 11:29 AM
 */


?>
@extends('layouts.app')

@section('content')
<div class="container is-fluid box">
    <div class="tabs is-centered is-large">
        <ul>
            <li :class="{'is-active': isActive('video')}" @click="getFiles('video')">
                <a>
                    <span class="icon is-small"><i class="fa fa-film"></i></span>
                    <span>Episodes</span>
                </a>
            </li>
        </ul>
    </div>

    <div class="tabs-details">
        <form class="needs-validation" action="{{ route('episode') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="form-row">
                @if($arry['teledramas'] !=null)
                <div class="col-md-4 mb-3">
                    <label for="teledrama_content">Select Teledrama</label>
                    <select class="custom-select" name="te_Id">

                        @foreach($arry['teledramas'] as $teledramas)

                        <option value="{{$teledramas->id}}"> {{$teledramas->te_Name}}</option>
                        @endforeach
                    </select>
                </div>
                @endif

                <div class="col-md-4 mb-3">
                    <label for="validationTooltip04">Video ID</label>
                    <input type="text" class="form-control" id="ep_videoID" name="ep_videoID"
                           placeholder="Input Video ID" onkeypress="function loadData()">

                    <div class="valid-tooltip">
                        Looks good!
                    </div>

                </div>

<!--                <div class="col-md-4 mb-3">-->
<!--                    <label for="validationTooltip04">Date Time</label>-->
<!--                    <input type="text" class="form-control" id="ep_DateTime" name="ep_DateTime"-->
<!--                           placeholder="Input Date & Time">-->
<!--                    <div class="valid-tooltip">-->
<!--                        Looks good!-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="col-md-4 mb-3">-->
<!--                    <label for="validationTooltip04">Title</label>-->
<!--                    <input type="text" class="form-control" id="ep_Title" name="ep_Title"-->
<!--                           placeholder="Input Title">-->
<!--                    <div class="valid-tooltip">-->
<!--                        Looks good!-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="col-md-4 mb-3">-->
<!--                    <label for="validationTooltip04">Description</label>-->
<!--                    <input type="text" class="form-control" id="ep_Description" name="ep_Description"-->
<!--                           placeholder="Input Description">-->
<!--                    <div class="valid-tooltip">-->
<!--                        Looks good!-->
<!--                    </div>-->
<!--                </div>-->

            </div>

            <button type="submit" class="btn btn-primary btn-lg btn-block">Submit</button>
        </form>
    </div>

    <br>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Video ID</th>
            <th scope="col">Episode Title</th>
            <th scope="col">Episode Description</th>
        </tr>
        </thead>
        <tbody>
        @foreach($arry['episodes'] as $episodes)
        <tr>
            <td> {{$episodes->ep_videoID}}</td>
            <td> {{$episodes->ep_Title}}</td>
            <td> {{$episodes->ep_Description}}</td>

        </tr>


        @endforeach
        </tbody>
    </table>


    <nav class="pagination is-centered" role="navigation" aria-label="pagination" v-if="pagination.last_page > 1"
         v-cloak>
        <a class="pagination-previous" @click.prevent="changePage(1)" :disabled="pagination.current_page <= 1">First
            page</a>
        <a class="pagination-previous" @click.prevent="changePage(pagination.current_page - 1)"
           :disabled="pagination.current_page <= 1">Previous</a>
        <a class="pagination-next" @click.prevent="changePage(pagination.current_page + 1)"
           :disabled="pagination.current_page >= pagination.last_page">Next page</a>
        <a class="pagination-next" @click.prevent="changePage(pagination.last_page)"
           :disabled="pagination.current_page >= pagination.last_page">Last page</a>
        <ul class="pagination-list">
            <li v-for="page in pages">
                <a class="pagination-link" :class="isCurrentPage(page) ? 'is-current' : ''"
                   @click.prevent="changePage(page)">
                    @{{ page }}
                </a>
            </li>
        </ul>
    </nav>
</div>
@endsection

