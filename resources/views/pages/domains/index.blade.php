@extends('layouts.metrolayout')

@section('content')
    <div class="container-fluid">
        <br>
        <h1>All IOCs:Domains</h1>
        <div>
            <table class="table table-border cell-border subcompact striped row-hover" data-role="table" data-rows="15" data-rows-steps="15, 30, 50, 100" data-horizontal-scroll="true">
                <thead>
                    <tr>
                        <th data-sortable="true" class="text-center va-top">PID</th>
                        <th data-sortable="true" class="text-center va-top">domain</th>
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
                    @if (count($domains) > 0)
                        @foreach ($domains as $domain)
                            <tr>
                                <td>{{ $domain->pid }}</td>
                                <td>{{ $domain->domain }}</td>
                                <td>{{ $domain->notes }}</td>
                                <td>{{ $domain->first_seen }}</td>
                                <td>{{ $domain->last_query }}</td>
                                <td>{{ $domain->created_by }}</td>
                                <td>{{ $domain->last_modified }}</td>
                                <td>{{ $domain->created_at }}</td>
                                <td>{{ $domain->updated_at }}</td>
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