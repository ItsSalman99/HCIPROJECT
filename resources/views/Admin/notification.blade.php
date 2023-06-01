@extends('layouts.admin')
@section('content')

<div class="cover-all-content">
    <div class="d-flex align-items-center justify-content-between flex-wrap">
        <h2 class="section-title">Notifications</h2>
    </div>
    <br>
    <br>
    <div class="cover-inner-content">
        <ul class="notification-list">
             @forelse(getNotifications() as $notification)
                @if(Auth::user()->user_type == 1 && $notification->user_id == Auth::user()->id)
                <li>
                    <div class="card notification-box white-bg-clr-02">
                        <div class="card-body2">
                            <div class="d-flex align-items-center gap-3">
                                <div class="svg-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="27" viewBox="0 0 18 21" class=" primary-svg">
                                        <path d="M12.0087 17.4253C11.8382 18.8804 10.601 20.0094 9.10017 20.0094C7.59932 20.0094 6.36217 18.8804 6.19165 17.4253H2.21282C1.16436 17.4253 0.314453 16.5773 0.314453 15.5304C0.314453 14.4848 1.16368 13.6354 2.21013 13.6354C2.30395 13.6354 2.38168 13.5576 2.38168 13.4625V9.32842C2.38168 6.38145 4.29365 3.81745 7.03294 2.93413V2.61049C7.03294 1.46916 7.95968 0.542969 9.10017 0.542969C10.2425 0.542969 11.1674 1.46723 11.1674 2.61049V2.93418C13.9066 3.81761 15.8187 6.38208 15.8187 9.32842V13.4625C15.8187 13.5595 15.8946 13.6354 15.9902 13.6354C17.035 13.6354 17.8859 14.4846 17.8859 15.5304C17.8859 16.5761 17.0352 17.4253 15.9875 17.4253H12.0087ZM10.9639 17.4253H7.23645C7.39848 18.3074 8.17127 18.9757 9.10017 18.9757C10.0291 18.9757 10.8019 18.3074 10.9639 17.4253ZM7.67851 3.82279C5.18753 4.46362 3.41529 6.71868 3.41529 9.32842V13.4625C3.41529 14.1283 2.87495 14.669 2.21013 14.669C1.73459 14.669 1.34807 15.0556 1.34807 15.5304C1.34807 16.006 1.73469 16.3917 2.21282 16.3917H15.9875C16.4648 16.3917 16.8523 16.0049 16.8523 15.5304C16.8523 15.0559 16.4646 14.669 15.9902 14.669C15.3238 14.669 14.785 14.1305 14.785 13.4625V9.32842C14.785 6.71929 13.0127 4.46372 10.5218 3.82281L10.1338 3.72297V2.61049C10.1338 2.03824 9.6718 1.57658 9.10017 1.57658C8.53039 1.57658 8.06655 2.04015 8.06655 2.61049V3.72296L7.67851 3.82279Z" />
                                    </svg>
                                </div>
                                <div>
                                    <a href="javascript:void(0)" class="default-black font-weight-600 primary-hover-clr text-truncate d-block" s style="width: clamp(16rem, 20vw, 22rem)">
                                        {{ $notification->title }}
                                    </a>
                                    <p class="m-0 font-12px">{{ $notification->body }}</p>
                                    <p>{{ date('F, j Y', strtotime($notification->created_at)) }}</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </li>
                @elseif(Auth::user()->user_type != 1 && $notification->user_id == Auth::user()->id)
                <li>
                    <div class="card notification-box white-bg-clr-02">
                        <div class="card-body2">
                            <div class="d-flex align-items-center gap-3">
                                <div class="svg-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="27" viewBox="0 0 18 21" class=" primary-svg">
                                        <path d="M12.0087 17.4253C11.8382 18.8804 10.601 20.0094 9.10017 20.0094C7.59932 20.0094 6.36217 18.8804 6.19165 17.4253H2.21282C1.16436 17.4253 0.314453 16.5773 0.314453 15.5304C0.314453 14.4848 1.16368 13.6354 2.21013 13.6354C2.30395 13.6354 2.38168 13.5576 2.38168 13.4625V9.32842C2.38168 6.38145 4.29365 3.81745 7.03294 2.93413V2.61049C7.03294 1.46916 7.95968 0.542969 9.10017 0.542969C10.2425 0.542969 11.1674 1.46723 11.1674 2.61049V2.93418C13.9066 3.81761 15.8187 6.38208 15.8187 9.32842V13.4625C15.8187 13.5595 15.8946 13.6354 15.9902 13.6354C17.035 13.6354 17.8859 14.4846 17.8859 15.5304C17.8859 16.5761 17.0352 17.4253 15.9875 17.4253H12.0087ZM10.9639 17.4253H7.23645C7.39848 18.3074 8.17127 18.9757 9.10017 18.9757C10.0291 18.9757 10.8019 18.3074 10.9639 17.4253ZM7.67851 3.82279C5.18753 4.46362 3.41529 6.71868 3.41529 9.32842V13.4625C3.41529 14.1283 2.87495 14.669 2.21013 14.669C1.73459 14.669 1.34807 15.0556 1.34807 15.5304C1.34807 16.006 1.73469 16.3917 2.21282 16.3917H15.9875C16.4648 16.3917 16.8523 16.0049 16.8523 15.5304C16.8523 15.0559 16.4646 14.669 15.9902 14.669C15.3238 14.669 14.785 14.1305 14.785 13.4625V9.32842C14.785 6.71929 13.0127 4.46372 10.5218 3.82281L10.1338 3.72297V2.61049C10.1338 2.03824 9.6718 1.57658 9.10017 1.57658C8.53039 1.57658 8.06655 2.04015 8.06655 2.61049V3.72296L7.67851 3.82279Z" />
                                    </svg>
                                </div>
                                 <div>
                                    <a href="javascript:void(0)" class="default-black font-weight-600 primary-hover-clr text-truncate d-block" s style="width: clamp(16rem, 20vw, 22rem)">
                                        {{ $notification->title }}
                                    </a>
                                    <p class="m-0 font-12px">{{ $notification->body }}</p>
                                    <p>{{ date('F, j Y', strtotime($notification->created_at)) }}</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </li>
                @endif
            @empty
                <li>
                    <a href="javascript:void(0)" class="dropdown-item">
                        <div class="inner-notification ">
                            <h6>No Notification Available!</h6>
                        </div>
                    </a>
                </li>
            @endforelse
        </ul>

    </div>

   @endsection
