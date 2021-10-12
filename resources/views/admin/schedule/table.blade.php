<table class="table table-separate table-head-custom collapsed" id="kt_datatable">
    <thead>
        <tr>
            <th>NO</th>
            <th>Label</th>
            <th>Start Time</th>
            <th>End Time</th>
            <th>ACTION</th>
        </tr>
    </thead>
    <tbody>
        @php
        $no = 1;
        @endphp
        @foreach ($data as $schedule)
        <tr>
            <td>{{ $no++}}</td>
            <td>{{ $schedule->text }}</td>
            <td>
                {{ $schedule->start }}
            </td>
            <td>{{ $schedule->end }}</td>
            <td>
                <div class="dropdown dropdown-inline">
                    <a href="javascript:;" class="btn btn-sm btn-clean btn-icon" data-toggle="dropdown">
                        <i class="la la-cog"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                        <ul class="nav nav-hoverable flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('schedule.edit', $schedule->id) }}">
                                    <i class="nav-icon la la-edit"></i>
                                    <span class="nav-text">Edit</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <form id="formDelete[{{ $schedule->id }}]" method="POST"
                                    action="{{ route('schedule.destroy', $schedule->id  ) }}">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $schedule->id }}">
                                </form>
                                <a class="nav-link deleteButton" onclick="deleteFunction({{ $schedule->id }})">
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