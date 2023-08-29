<table class="table table-responsive-md">
    <thead>
        <tr>
            <th ><strong>Sr. NO.</strong></th>
            <th><strong>NAME</strong></th>
            <th scope="col">Target</th>
            <th scope="col">Total Target</th>
            <th scope="col">Completed</th>
            <th scope="col">Remaining</th>
            <th>Assign Target</th>
        </tr>
    </thead>
    <tbody>
        @php
        $total_month_target = 0;
        $total_target = 0;
        $total_complete = 0;
        $total_left = 0;
    @endphp
    {{--  @php
    $user = \App\Models\User::where('',Auth::user()->id)->where('is_active',1)->get();
    @endphp  --}}
    @foreach ($user as $obj => $users)
        <tr>
            <td><strong>{{ $obj+1 }}</strong></td>
            <td>
                <div class="d-flex align-items-center"><img src="{{ url($users->image) }}" class="rounded-lg me-2" width="24" alt=""/> <span class="w-space-no">{{ $users->name }}</span></div>
            </td>

            <td>
                @php
                $FMS = $users->fmstargets()->first();
                @endphp
                @if ($FMS)
                    <span class="badge badge-primary light">{{ $FMS->month_target }}</span>
                @else
                    <span class="badge badge-primary light">0</span>
                @endif
            </td>
            <td> @if ($FMS)
                <span class="badge badge-warning light">{{ $FMS->target }}</span>
                @else
                    <span class="badge badge-warning light">0</span>
                @endif
            <td>
                @if ($FMS)
                    <span class="badge badge-success light">{{ $FMS->complete }}</span>
                @else
                    <span class="badge badge-success light">0</span>
                @endif
            </td>
            <td>
                 @if ($FMS)
                    <span class="badge badge-danger light">{{ $FMS->remaining }}</span>
                @else
                    <span class="badge badge-danger light">0</span>
                @endif
            </td>
              <td>
                   <input type="number" min="0" max="50" name="{{ $users['id'] }}"
                     class="form-control" placeholder="Set Target" required>
             </td>

        </tr>
    @endforeach
    </tbody>
</table>
