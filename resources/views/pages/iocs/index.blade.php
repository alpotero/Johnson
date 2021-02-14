@extends('layouts.metrolayout')

@section('content')

    <div class="container-fluid">
        <br>
        <h1>All IOCs</h1>
        <div>
            <table class="table table-border cell-border subcompact striped row-hover" data-role="table" data-rows="15" data-rows-steps="15, 30, 50, 100" data-horizontal-scroll="true">
                <thead>
                    <tr>
                        <th data-sortable="true" class="text-center va-top">PID</th>
                        <th data-sortable="true" class="text-center va-top">IOC Type</th>
                        <th data-sortable="true" class="text-center va-top">Indication of Compromise (IOC)</th>
                        <th data-sortable="true" class="text-center va-top">Page</th>
                        <th data-sortable="true" class="text-center va-top">Related Blog ID</th>
                        <th data-sortable="true" class="text-center va-top">Created at</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($iocs) > 0)
                        @foreach ($iocs as $ioc)
                            <tr>
                                <td>{{ $ioc->pid }}</td>
                                <td>{{ $ioc->ioc_type }}</td>
                                <td>{{ $ioc->ioc }}</td>
                                <td>{{ $ioc->page }}</td>
                                <td style="overflow: auto;">
                                    @foreach(explode(',', $ioc->related_blog_id) as $related_blog_id)
                                        <a href="/blogs/{{ $related_blog_id }}" title="View full details" target="_blank" rel="noopener noreferrer">,{{ $related_blog_id }}</a>
                                    @endforeach
                                </td>
                                <td>{{ $ioc->created_at }}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="12">No IOCs to show</td>
                        </tr>
                    @endif                    
                </tbody>
            </table>
        </div>
    </div>
@endsection