<div id="kt_drawer_chat" class="bg-body" data-kt-drawer="true" data-kt-drawer-name="chat" data-kt-drawer-activate="true"
     data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'300px', 'md': '500px'}"
     data-kt-drawer-direction="end" data-kt-drawer-toggle="#kt_drawer_chat_toggle"
     data-kt-drawer-close="#kt_drawer_chat_close">
    <div class="card w-100 border-0 rounded-0" id="kt_drawer_chat_messenger">
        <div class="card-header pe-5" id="kt_drawer_chat_messenger_header">
            <div class="card-title">
                <div class="d-flex align-items-center mb-2">
                    <div class="symbol symbol-35px symbol-circle">
                        <span class="symbol-label fs-6 fw-bolder bg-light-info text-info" id="chat_symbol">H</span>
                    </div>
                    <div class="ms-3">
                        <span id="chat_id" class="fs-4 fw-bold text-gray-900 text-hover-primary me-1 mb-2 lh-1"></span>
                    </div>
                </div>


            </div>
            <div class="card-toolbar">
                <div class="btn btn-sm btn-icon btn-active-color-primary"
                     id="kt_drawer_chat_close">{!! getIcon('cross-square', 'fs-2') !!}</div>

            </div>


        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body" id="kt_drawer_chat_messenger_body">
            <!--begin::Messages-->
            <div class="scroll-y me-n5 pe-5" id="chat_messenger_body" data-kt-element="messages" data-kt-scroll="true"
                 data-kt-scroll-activate="true" data-kt-scroll-height="auto"
                 data-kt-scroll-dependencies="#kt_drawer_chat_messenger_header, #kt_drawer_chat_messenger_footer"
                 data-kt-scroll-wrappers="#kt_drawer_chat_messenger_body" data-kt-scroll-offset="0px"
                 style="overflow: scroll;">

            </div>
            <!--end::Messages-->
        </div>
        <!--end::Card body-->
        <!--begin::Card footer-->
        <div class="card-footer pt-4" id="kt_drawer_chat_messenger_footer">
            <textarea class="form-control form-control-flush mb-3" rows="1" id="input_massage"
                      placeholder="Type a message"></textarea>
            <div id="recording" class="d-none d-flex align-items-center">
                <select id="encodingTypeSelect" class="d-none">
                    <option value="ogg">Ogg Vorbis (.ogg)</option>
                    <option value="mp3">MP3 (MPEG-1 Audio Layer III) (.mp3)</option>
                    <option value="wav">Waveform Audio (.wav)</option>
                </select>


                <span id="action_recording">
                     <button id="stopButton" disabled class="btn btn-sm btn-light btn-active-danger"> Stop</button>
                    <span class="text-danger mx-2"> Recording... </span>
                </span>
                <span class="d-none" id="base64"></span>
                <span id="recordingList" class="mx-3 "></span>
                <button id="cancelRecordButton" class="btn btn-sm btn-light btn-active-danger d-none"> Cancel
                </button>
            </div>


            <div class="d-flex flex-stack">
                <!--begin::Actions-->
                <div class="d-flex align-items-center me-2">
                    {{--<button class="btn btn-sm btn-icon btn-active-light-primary me-1" type="button"
                            data-bs-toggle="tooltip" title="Coming soon">{!! getIcon('paper-clip', 'fs-3') !!}</button>--}}
                    <button class="btn btn-sm btn-icon btn-active-light-primary me-1" type="button" id="recordButton">
                        <i class="fas fa-microphone-alt text-hover-primary fa-xl "></i>
                    </button>
                </div>
                <!--end::Actions-->
                <!--begin::Send-->
                <button class="btn btn-primary" type="button" id="btn_send">Send</button>
                <!--end::Send-->
            </div>
            <!--end::Toolbar-->
        </div>
        <!--end::Card footer-->
    </div>
    <!--end::Messenger-->
</div>
<!--end::Chat drawer-->




