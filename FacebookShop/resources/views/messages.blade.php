@extends('layout.adminDashboard')

@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title" style="color: #1da1f2">
                    <h2><b>Unread Messages</b>
                    </h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">

                    <table id="datatable-fixed-header" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>Message ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Message</th>
                            <th>Date</th>
                            <th>State</th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php
                        use App\Http\Models\Message;
                        $messageNew = new Message();
                        $messages = $messageNew->getUnreadMessages();
                        ?>
                        @foreach( $messages as $message)

                            <tr>
                                <td>{{$message->message_id}}</td>
                                <td>{{$message->name}}</td>
                                <td>{{$message->email}}</td>
                                <td>{{$message->message}}</td>
                                <td>{{$message->created_at}}</td>
                                <td><a href="{{route('markAsRead',[
                                'messageId'=>$message->message_id
                                ])}}">
                                        <button type="button" class="btn btn-link">Mark As Read</button>
                                    </a>

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title" style="color: #1da1f2">
                    <h2><b>Read Messages</b>
                    </h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">

                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>Message ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Message</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php
                        $messages = $messageNew->getReadMessages();
                        ?>
                        @foreach( $messages as $message)

                            <tr>
                                <td>{{$message->message_id}}</td>
                                <td>{{$message->name}}</td>
                                <td>{{$message->email}}</td>
                                <td>{{$message->message}}</td>
                                <td>{{$message->created_at}}</td>
                                <td><a href="{{route('markAsUnread',[
                                'messageId'=>$message->message_id
                                ])}}">
                                        <button type="button" class="btn btn-link">Mark As Unread</button>
                                    </a>

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection