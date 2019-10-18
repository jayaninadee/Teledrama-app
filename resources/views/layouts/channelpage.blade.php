@extends('layouts.app')

@section('content')
<div class="container is-fluid box">
    <div class="tabs is-centered is-large">
        <ul>
            <li :class="{'is-active': isActive('video')}" @click="getFiles('video')">
                <a>
                    <span class="icon is-small"><i class="fa fa-film"></i></span>
                    <span>Channels</span>
                </a>
            </li>
        </ul>
    </div>

    <div class="tabs-details">
        <form class="needs-validation" action="{{ route('channel') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="validationTooltip01">Channel Name</label>
                    <input type="text" class="form-control" id="validationTooltip01" name="ch_Name"
                           placeholder="Input Channel Name">
                    <div class="valid-tooltip">
                        Looks good!
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="validationTooltip01">Video ID</label>
                    <input type="text" class="form-control" id="validationTooltip01" name="ep_videoID"
                           placeholder="Input Video ID">
                    <div class="valid-tooltip">
                        Looks good!
                    </div>
                </div>
                <div class="col-md-3 mb-5">
                    <label for="validationTooltip01">Channel Image</label>
                    <div class="custom-file">
                        <input type="file" onchange="readURL(this);" class="custom-file-input" id="inputGroupFile02"
                               name="ch_Image">
                        <label class="custom-file-label" for="inputGroupFile02"
                               aria-describedby="inputGroupFileAddon02"></label>
                    </div>
                    <img id="img" src=""/>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-lg btn-block">Submit</button>
        </form>
    </div>
    <br>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Channel Name</th>
            <th scope="col">Video ID</th>
            <th scope="col">Channel Image</th>
        </tr>
        </thead>
        <tbody>
        @foreach($channels as $channels)
        <tr>
            <td> {{$channels->ch_Name}}</td>
            <td> {{$channels->ep_videoID}}</td>
            <td><img height="42" width="42" src="images/{{$channels->ch_Image}}"></td>
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


