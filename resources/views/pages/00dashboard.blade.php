@extends('layouts.metrolayout')

@section('content')
    
    <h1>Today's IOCs</h1>
    <div class="container-fluid">
        <div>
            <table class="table table-border cell-border subcompact">
                <thead>
                    <tr>
                        <th>Actions</th>
                        <th>Pid</th>
                        <th>Source Type</th>
                        <th>Blog ID</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Published Date (PST)</th>
                        <th>Link</th>
                        <th>RSS Source</th>
                        <th>Date Created (UTC 0)</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>H/Sft</td>
                        <td>0</td>
                        <td>URL</td>
                        <td>2318fc767377142ec0ab3f3b636070b90b1f5ccbd7532c50b6ea1917eae2c8d5</td>
                        <td>Iranian RANA Android Malware Also Spies On Instant Messengers</td>
                        <td>Some Author here</td>
                        <td>Mon, 07 Dec 2020 06:57:40</td>
                        <td>Lnkicon</td>
                        <td>hackernews</td>
                        <td>2020-12-21 08:36:55</td>
                        <td>None</td>
                    </tr>

                    @php
                    /*
                            //Select all in tbl_blog and display as table.
                            $sqlquery = "SELECT `pid`, `source_type`, `blog_id`, `title`, `summary`, `author`, `published_date`, `link`, `rss_source`, `date_created`, `duplicate_to`, `hidden`, `testing_status` FROM `tbl_blog`";
                            $sqlqueryresult = $conn->query($sqlquery);
                            
                            if (!empty($sqlqueryresult) && $sqlqueryresult->num_rows > 0) {
                                //For each record, display as row.
                                while($sqlqueryrow = $sqlqueryresult->fetch_assoc()) {
                                    echo "
                                    <tr>
                                        <td>H/Sft</td>
                                        <td>". $sqlqueryrow["pid"] ."</td>
                                        <td>". $sqlqueryrow["source_type"] ."</td>
                                        <td>". $sqlqueryrow["blog_id"] ."</td>
                                        <td>". $sqlqueryrow["title"] ."</td>
                                        <td>". $sqlqueryrow["author"] ."</td>
                                        <td>". $sqlqueryrow["published_date"] ."</td>
                                        <td>Lnkicon</td>
                                        <td>". $sqlqueryrow["rss_source"] ."</td>
                                        <td>". $sqlqueryrow["date_created"] ."</td>
                                        <td>". $sqlqueryrow["testing_status"] ."</td>
                                    </tr>
                                ";
                                    echo "PID: " . $sqlqueryrow["pid"]. " already exists in the db, skipping... </br>";
                                }
                            } else {
                                //No records found on tbl_blog
                                echo "
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                ";
                            }
                    */
                    @endphp
                </tbody>
            </table>
        </div>
    </div>
@endsection