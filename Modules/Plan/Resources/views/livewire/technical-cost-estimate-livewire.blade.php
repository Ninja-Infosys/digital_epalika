<form wire:submit.prevent="submitFormData">
    <div class="table-responsive">
        <table class="table table-sm table-bordered">
            <thead>
            <tr>
                <th>क्र.स</th>
                <th style="min-width: 200px">विवरण</th>
                <th>संख्या</th>
                <th>लम्बाई</th>
                <th>चौडाई</th>
                <th>उचाइ</th>
                <th>परिमाण</th>
                <th>इकाई</th>
                <th>दर</th>
                <th>रकम</th>
                <th class="p-0 align-middle">
                    <button type="button" wire:click="addTechnicalCostEstimates" class="btn btn-xs btn-outline-primary">
                        <i class="fa fa-plus-circle"></i>
                    </button>
                </th>
            </tr>
            </thead>
            <tbody>
            @forelse($technicalCostEstimates as $key=>$technicalCostEstimate)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td class="p-0">
                        <input
                            type="text"
                            wire:model="technicalCostEstimates.{{$key}}.detail"
                            class="form-control form-control-sm"
                            placeholder="विवरण"
                        />
                    </td>
                    <td class="p-0">
                        <input
                            type="number"
                            wire:model="technicalCostEstimates.{{$key}}.number"
                            class="form-control form-control-sm"
                            placeholder="संख्या"
                        />
                    </td>
                    <td class="p-0">
                        <input
                            type="number"
                            wire:model="technicalCostEstimates.{{$key}}.length"
                            class="form-control form-control-sm"
                            placeholder="लम्बाई"
                        />
                    </td>
                    <td class="p-0">
                        <input
                            type="number"
                            wire:model="technicalCostEstimates.{{$key}}.breadth"
                            class="form-control form-control-sm"
                            placeholder="चौडाई"
                        />
                    </td>
                    <td class="p-0">
                        <input
                            type="number"
                            wire:model="technicalCostEstimates.{{$key}}.height"
                            class="form-control form-control-sm"
                            placeholder="ऊचाई"
                        />
                    </td>
                    <td class="p-0">
                        <input
                            type="number"
                            wire:model="technicalCostEstimates.{{$key}}.quantity"
                            class="form-control form-control-sm"
                            placeholder="परिमाण *"
                        />
                    </td>
                    <td class="p-0">
                        <input
                            type="text"
                            wire:model="technicalCostEstimates.{{$key}}.unit"
                            class="form-control form-control-sm"
                            placeholder="इकाइ"
                        />
                    </td>
                    <td class="p-0">
                        <input
                            type="number"
                            wire:model="technicalCostEstimates.{{$key}}.rate"
                            class="form-control form-control-sm"
                            placeholder="दर *"
                        />
                    </td>
                    <td class="p-0 align-middle">
                        {{(double)($technicalCostEstimate['quantity']??0)*(double)($technicalCostEstimate['rate']??0)}}
                    </td>
                    <td class="p-0 align-middle">
                        <button type="button" wire:click="removeTechnicalCostEstimate({{$key}})"
                                class="btn btn-xs btn-outline-danger">
                            <i class="fa fa-trash"></i>
                        </button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td class="text-center" colspan="10">
                        विवरण थप्न प्लस बटन क्लिक गर्नुहोस्
                    </td>
                </tr>
            @endforelse
            </tbody>
            <tfoot>
            <tr>
                <th colspan="8">जम्मा रकम</th>
                <td colspan="3">रू. {{$project->technicalCostEstimates->sum('amount')}}</td>
            </tr>
            </tfoot>
        </table>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

    <button type="submit" class="btn btn-primary">
        Save
    </button>
</form>
