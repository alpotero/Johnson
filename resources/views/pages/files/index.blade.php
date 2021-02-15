@extends('layouts.metrolayout')

@section('content')
    <div class="container-fluid">
        <br>
        <h1>All IOCs: Files</h1>
        <div>
            <table class="table table-border cell-border subcompact striped row-hover" data-role="table" data-rows="15" data-rows-steps="15, 30, 50, 100" data-horizontal-scroll="true">
                <thead>
                    <tr>
                        <th data-sortable="true" class="text-center va-top">PID</th>
                        <th data-sortable="true" class="text-center va-top">Type</th>
                        <th data-sortable="true" class="text-center va-top">Hash</th>
                        <th data-sortable="true" class="text-center va-top">DDAn Coverage</th>
                        <th data-sortable="true" class="text-center va-top">VSAPI Coverage</th>
                        <th data-sortable="true" class="text-center va-top">PML Coverage</th>
                        <th data-sortable="true" class="text-center va-top">BM Coverage</th>
                        <th data-sortable="true" class="text-center va-top">First Seen</th>
                        <th data-sortable="true" class="text-center va-top">Last Query</th>
                        <th data-sortable="true" class="text-center va-top">Download Available</th>
                        <th data-sortable="true" class="text-center va-top">Created By</th>
                        <th data-sortable="true" class="text-center va-top">Last Modified</th>
                        <th data-sortable="true" class="text-center va-top">Created at</th>
                        <th data-sortable="true" class="text-center va-top">Updated at</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($files) > 0)
                        @foreach ($files as $file)
                            <tr>
                                <td>{{ $file->pid }}</td>
                                <td>{{ $file->hash_type }}</td>
                                <td>{{ $file->hash }}</td>
                                <td>{{ $file->ddan }}</td>
                                <td>
                                    @if ($file->vsapi == "Untested")
                                        {{ $file->vsapi }}
                                    @elseif ($file->vsapi == "Unsupported")
                                        {{ $file->vsapi }}
                                    @else
                                        <a href="https://www.trendmicro.com/vinfo/us/threat-encyclopedia/malware/{{ $file->vsapi }}" title="Check in Threat Encyclopedia" target="_blank" rel="noopener noreferrer">{{ $file->vsapi }}</a>
                                    @endif
                                </td>
                                <td>{{ $file->pml }}</td>
                                <td>{{ $file->bm }}</td>
                                <td>{{ $file->first_seen }}</td>
                                <td>{{ $file->last_query }}</td>
                                <td>
                                    @if ($file->download_available == "Yes")
                                        <a href="https://www.virustotal.com/gui/search/{{ $file->hash }}" title="Check in virustotal" target="_blank" rel="noopener noreferrer"><span class="mif-link mif-lg fg-primary"></span></a>
                                    @else
                                        {{ $file->download_available }}
                                    @endif
                                </td>
                                <td>{{ $file->created_by }}</td>
                                <td>{{ $file->last_modified }}</td>
                                <td>{{ $file->created_at }}</td>
                                <td>{{ $file->updated_at }}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="12">No File IOCs to show</td>
                        </tr>
                    @endif                    
                </tbody>
            </table>
        </div>
    </div>
@endsection