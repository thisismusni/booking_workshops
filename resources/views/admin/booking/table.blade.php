<table class="table table-separate table-head-custom collapsed" id="kt_datatable">
    <thead>
        <tr>
            <th>NO</th>
            <th>User</th>
            <th>Status</th>
            <th>Order Date</th>
            <th>ACTION</th>
        </tr>
    </thead>
    <tbody>
        @php
        $no = 1;
        @endphp
        @foreach ($data as $booking)
        <tr>
            <td>{{ $no++}}</td>
            <td>{{ $booking->user->email }}</td>
            <td>
                @if($booking->status == 1)
                <span class="label label-success label-inline mr-2">Book</span>
                @elseif($booking->status == 2)
                <span class="label label-warning label-inline mr-2">Process</span>
                @elseif($booking->status == 3)
                <span class="label label-info label-inline mr-2">Finished</span>
                @else
                <span class="label label-danger label-inline mr-2">Cancaled</span>
                @endif
            </td>
            <td>{{ $booking->order_date }}</td>
            <td>
                <div class="dropdown dropdown-inline">
                    <a href="javascript:;" class="btn btn-sm btn-clean btn-icon" data-toggle="dropdown">
                        <i class="la la-cog"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                        <ul class="nav nav-hoverable flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="">
                                    <i class="nav-icon la la-edit"></i>
                                    <span class="nav-text">Edit</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link deleteButton" onclick="deleteFunction({{ $booking->id }})">
                                    <i class="nav-icon la la-trash"></i>
                                    <span class="nav-text">Delete</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th>NO</th>
            <th>User</th>
            <th>Status</th>
            <th>Order Date</th>
            <th>ACTION</th>
        </tr>
    </tfoot>
</table>