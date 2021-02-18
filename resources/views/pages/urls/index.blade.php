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
                        <th data-sortable="true" class="text-center va-top">URL</th>
                        <th data-sortable="true" class="text-center va-top">Rating</th>
                        <th data-sortable="true" class="text-center va-top">Category</th>
                        <th data-sortable="true" class="text-center va-top">Notes</th>
                        <th data-sortable="true" class="text-center va-top">First Seen</th>
                        <th data-sortable="true" class="text-center va-top">Last Query</th>
                        <th data-sortable="true" class="text-center va-top">Created By</th>
                        <th data-sortable="true" class="text-center va-top">Last Modified</th>
                        <th data-sortable="true" class="text-center va-top">Created at</th>
                        <th data-sortable="true" class="text-center va-top">Updated at</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($urls) > 0)
                        @foreach ($urls as $url)
                            <tr>
                                <td>{{ $url->pid }}</td>
                                <td>{{ $url->url }}</td>
                                <td>
                                    @if ($url->rating == "Dangerous")
                                        <strong class="fg-crimson">{{ $url->rating }}</strong>
                                    @elseif ($url->rating == "Safe")
                                        <strong class="fg-emerald">{{ $url->rating }}</strong>
                                    @else
                                        <strong>{{ $url->rating }}</strong>
                                    @endif
                                    
                                </td>
                                <td>{{ $url->category }}</td>
                                <td>{{ $url->notes }}</td>
                                <td>{{ $url->first_seen }}</td>
                                <td>{{ $url->last_query }}</td>
                                <td>{{ $url->created_by }}</td>
                                <td>{{ $url->last_modified }}</td>
                                <td>{{ $url->created_at }}</td>
                                <td>{{ $url->updated_at }}</td>
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