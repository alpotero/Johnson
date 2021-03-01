@extends('layouts.metrolayout')

@section('content')

    <div class="container-fluid">
        <br>
        <h1>All Blogs</h1>
        <div>
            <table class="table table-border cell-border subcompact striped row-hover" data-role="table" data-rows="15" data-rows-steps="15, 30, 50, 100" data-horizontal-scroll="true">
                <thead>
                    <tr>
                        <th class="text-center" style="width:5%;">Actions</th>
                        <th data-sortable="true" class="text-center va-top">Pid</th>
                        <th data-sortable="true" class="text-center va-top">Src Type</th>
                        <th data-sortable="true" class="text-center va-top">Blog ID</th>
                        <th data-sortable="true" class="text-center va-top">Title</th>
                        <th data-sortable="true" class="text-center va-top">Author</th>
                        <th data-sortable="true" class="text-center va-top">Published Date </br>(PST)</th>
                        <th data-sortable="true" class="text-center va-top">Link</th>
                        <th data-sortable="true" class="text-center va-top">RSS Source</th>
                        <th data-sortable="true" class="text-center va-top">Date Created </br>(UTC 0)</th>
                        <th data-sortable="true" class="text-center va-top">Status</th>
                        <th data-sortable="true" class="text-center va-top">Hidden</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($blogs) > 0)
                        @foreach ($blogs as $blog)
                            <tr>
                                <td>
                                    <a href='' class='button dark mini link cycle mif-blocked fg-dark' title='Hide/Ignore'></a>
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
                                    <a href="/blogs/{{ $blog->blog_id }}" title="View full details" target="_blank" rel="noopener noreferrer" class="fg-black" style="text-decoration:none;">{{ $blog->blog_id }}</a>
                                </td>
                                <td>{{ $blog->title }}</td>
                                <td class="text-ellipsis">{{ $blog->author }}</td>
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
                            <td colspan="12">No blogs to show</td>
                        </tr>
                    @endif                    
                </tbody>
            </table>
        </div>
    </div>
@endsection