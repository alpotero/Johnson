@extends('layouts.metrolayout')

@section('content')
    
    <h1>Today's IOCs</h1>
    <div class="container-fluid">
        <div>
            <table class="table table-border cell-border subcompact striped row-hover" data-role="table">
                <thead>
                    <tr>
                        <th style="width:5%;">Actions</th>
                        <th>Pid</th>
                        <th>Src Type</th>
                        <th>Blog ID</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Published Date (PST)</th>
                        <th>Link</th>
                        <th>RSS Source</th>
                        <th class="sortable-column sort-asc">Date Created (UTC 0)</th>
                        <th>Status</th>
                        <th>Hidden</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($tblBlogs) > 1)
                        @foreach ($tblBlogs as $blog)
                            <tr>
                                <td>
                                    <a href='' class='button dark mini link cycle' title='Hide/Ignore'><span class='mif-blocked fg-dark'></span></a>
                                    <a href='' class='button warning mini link cycle' title='Mark as duplicate'><span class='mif-files-empty fg-dark'></span></a>
                                    <a href='' class='button alert mini link cycle' title='Submit for testing'><span class='mif-arrow-right fg-dark'></span></a>
                                </td>
                                <td>{{ $blog->pid }}</td>
                                <td>
                                    @if ($blog->source_type = "URL")
                                        <span class="mif-http mif-3x fg-darkEmerald" title="URL"></span>
                                    @else
                                        <span class="mif-file-text mif-lg fg-darkCobalt" title="File"></span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ url('/tblBlogs/'.$blog->blog_id) }}" title="View full details" target="_blank" rel="noopener noreferrer" class="fg-black" style="text-decoration:none;">{{ $blog->blog_id }}</a>
                                </td>
                                <td>{{ $blog->title }}</td>
                                <td>{{ $blog->author }}</td>
                                <td>{{ $blog->published_date }}</td>
                                <td>
                                    <a href="{{ $blog->link }}" title="{{ $blog->link }}" target="_blank" rel="noopener noreferrer"><span class="mif-link mif-lg fg-primary"></span></a>
                                </td>
                                <td>{{ $blog->rss_source }}</td>
                                <td>{{ $blog->date_created }}</td>
                                <td>{{ $blog->testing_status }}</td>
                                <td>{{ $blog->hidden }}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="12">Blogs today found</td>
                        </tr>
                    @endif                    
                </tbody>
            </table>
        </div>
    </div>
@endsection