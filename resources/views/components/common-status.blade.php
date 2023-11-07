@php use App\Enums\CommonStatusEnum; @endphp

@if($status === CommonStatusEnum::ACTIVE->value)
    <span class="badge badge-rounded badge-soft-success badge-lg">Active</span>
@elseif($status === CommonStatusEnum::IN_ACTIVE->value)
    <span class="badge badge-rounded badge-soft-danger badge-lg">Inactive</span>
@endif
