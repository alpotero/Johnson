@extends('layouts.metrolayout')

@section('content')
    <div class="container pt-20">
        <blockquote>
            <h2>{{$blog[0]->title}}</h2>
            <small>Author: 
                <cite title="Source Title">
                    {{$blog[0]->author}}
                </cite>
            </small>
        </blockquote>
        </br>
        <div class="bg-light border bd-gray border-radius-4" data-role="accordion"
            data-one-frame="false"
            data-show-active="true">
            <div class="frame active">
                <div class="heading bg-dark fg-light"><h4>Summary</h4></div>
                <div class="content bg-white">
                    <div class="p-5 pl-10 pb-10">
                        <p class="indent">
                            @if ($blog[0]->summary == "")
                                    No summary yet. 
                            @else
                                {!! $blog[0]->summary !!}
                            @endif
                        </p>
                    </div>
                </div>
            </div>
            <div class="frame active">
                <div class="heading bg-dark fg-light"><h5>Additional Details</h5></div>
                <div class="content bg-white">
                    <div class="p-5 pl-10 pb-10">
                        <dl class="horizontal">
                            <dt>PID: </dt>
                                <dd>{{$blog[0]->pid}}</dd>
                            <dt>Blog ID: </dt>
                                <dd>{{$blog[0]->blog_id}}</dd>
                            <dt>Type of Source: </dt>
                                <dd>{{$blog[0]->source_type}}</dd>
                            <dt>Published Date: </dt>
                                <dd>{{$blog[0]->published_date}} <strong>UTC 0</strong></dd>
                            <dt>Link: </dt>
                                <dd>
                                    <a href='{{$blog[0]->link}}' title="Go to {{$blog[0]->rss_source}}" target="_blank" rel="noopener noreferrer">{{$blog[0]->link}}</a>
                                </dd>
                            <dt>RSS: </dt>
                                <dd>{{$blog[0]->rss_source}}</dd>
                            <dt>Date Created: </dt>
                                <dd>{{$blog[0]->date_created}} <strong>UTC 0</strong></dd>
                            <dt>Testing Status: </dt>
                                <dd>{{$blog[0]->testing_status}}</dd>
                            <dt>Other Actions: </dt>
                                <dd>
                                    <a href='/blogs/{{ $blog[0]->blog_id }}/edit' class='button dark rounded fg-light' title='Hide/Ignore'><span class='mif-pencil fg-light'></span>&nbsp;Edit</a>
                                </dd>
                        </dl>
                    </div>
                </div>
            </div>
            <div class="frame">
                <div class="heading bg-dark fg-light"><h5>Related IOCs</h5></div>
                <div class="content bg-white">
                    <div class="p-5">
                        <table class="table table-border cell-border subcompact striped row-hover" data-role="table" data-rows="15" data-rows-steps="15, 30, 50, 100" data-horizontal-scroll="true">
                            <thead>
                                <tr>
                                    <th data-sortable="true" class="text-center va-top">Pid</th>
                                    <th data-sortable="true" class="text-center va-top">Type</th>
                                    <th data-sortable="true" class="text-center va-top">Indication of Compromise (IOC)</th>
                                    <th data-sortable="true" class="text-center va-top">Page</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>98</td>
                                    <td>File</td>
                                    <td>26af537c457c954dfc667f67f76909fa90889b14cb6736a7678c6eb59cbf951b</td>
                                    <td>1</td>
                                </tr>
                                <tr>
                                    <td>116</td>
                                    <td>File</td>
                                    <td>276baecaef6ead3a6be0c37c7b9c40133ea0386e6a7540e58bce5b08448c3d70</td>
                                    <td>2</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="frame">
                <div class="heading ribbed-lightGray fg-dark"><h5>Related/Duplicate Blogs</h5></div>
                <div class="content bg-white">
                    <div class="p-5 pl-10">
                        List of blogs simmilar to this and can be tagged as "Duplicate"...
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection