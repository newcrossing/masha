@extends('backend.layouts.contentLayoutMaster')
{{-- page title --}}
@section('title','Документ')
{{-- vendor styles --}}
@section('vendor-styles')
    <link rel="stylesheet" type="text/css" href="/adm/app-assets/vendors/css/forms/select/select2.min.css">
    <link rel="stylesheet" type="text/css" href="/adm/app-assets/vendors/css/pickers/pickadate/pickadate.css">
@endsection
{{-- page styles --}}
@section('page-styles')

@endsection


@section('content')
    <!-- app invoice View Page -->
    <section class="invoice-edit-wrapper">
        @if(session('success'))
            <div class="alert bg-rgba-success alert-dismissible mb-2" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <div class="d-flex align-items-center">
                    <i class="bx bx-like"></i>
                    <span>  {{session('success')}}  </span>
                </div>
            </div>
        @endif
        @if ($errors->any())
            <div class="alert bg-rgba-danger alert-dismissible mb-2" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <div class="d-flex align-items-center">
                    <i class="bx bx-error"></i>
                    <span>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </span>
                </div>
            </div>
        @endif

        <form action="{{ (isset($doc->id))? route('doc.update',$doc->id):route('doc.store')  }}" method="POST">
            @csrf
            @if(isset($doc->id))
                @method('PUT')
            @endif
            <div class="row">
                <!-- invoice view page -->
                <div class="col-xl-9 col-md-8 col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body pb-0 mx-25">
                                <div class="invoice-subtotal pt-50">
                                    <div class="row">
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <h6 class="invoice-to">Чей документ </h6>
                                                <input type="text" name="preamble_name" class="form-control"
                                                       value="{{old('preamble_name',$doc->preamble_name)}}">
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-12">
                                            <div class="form-group">
                                                <h6 class="invoice-to">Номер </h6>
                                                <input type="text" name="nomer" class="form-control"
                                                       value="{{old('nomer',$doc->nomer)}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <h6 class="invoice-to">О чем </h6>
                                                <input type="text" name="short_name" class="form-control"
                                                       value="{{old('short_name',$doc->short_name)}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row ">
                                    <div class="col-sm-12 col-12 order-2 order-sm-1">
                                        <h4 class="text-primary">Название </h4>
                                        <textarea name="name" class="form-control"
                                                  rows="3">{{old('name',$doc->name)}}</textarea>

                                    </div>
                                </div>

                                <hr>

                                <div class="row invoice-info">
                                    <div class="col-lg-12 col-md-12 mt-25">
                                    <textarea class="ckeditor" cols="80" id="editor1"
                                              name="text">{{old('text',$doc->text)}}</textarea>
                                    </div>
                                </div>

                                <hr>

                                <div class="invoice-subtotal pt-50">
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <h6 class="invoice-to">Примечание </h6>
                                                <textarea name="annotation" class="form-control"
                                                          rows="3">{{old('annotation',$doc->annotation)}}</textarea>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <h6 class="invoice-to">Описание </h6>
                                                <textarea name="description" class="form-control" rows="3"
                                                >{{old('description',$doc->description)}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <hr>
                                <hr>

                                <div class="invoice-subtotal pt-50">
                                    <div class="row">
                                        <div class="col-md-5 col-12">
                                            <div class="form-group">
                                                <h6 class="invoice-to">Мета заголовок </h6>
                                                <input type="text" name="meta_title" class="form-control"
                                                       value="{{old('meta_title',$doc->meta_title)}}">
                                            </div>

                                            <div class="form-group">
                                                <h6 class="invoice-to">Описание</h6>
                                                <textarea name="meta_disc" class="form-control"
                                                          rows="2">{{old('text',$doc->meta_disc)}}</textarea>

                                            </div>

                                        </div>
                                        <div class="col-lg-5 col-md-7 offset-lg-2 col-12">
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item d-flex justify-content-between border-0 pb-0">
                                                    <span class="invoice-subtotal-title">Просмотров за сутки</span>
                                                    <h6 class="invoice-subtotal-value mb-0">{{(@$doc->hits)}}</h6>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between border-0 pb-0">
                                                    <span class="invoice-subtotal-title">Всего</span>
                                                    <h6 class="invoice-subtotal-value mb-0">-</h6>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr/>
                <!-- invoice action  -->
                <div class="col-xl-3 col-md-4 col-12">
                    <div class="card invoice-action-wrapper shadow-none border">
                        <div class="card-body">
                            <div class="invoice-action-btn mb-1">
                                <button type="submit" name="redirect" value="apply"
                                        class="btn btn-primary btn-block invoice-send-btn">
                                    <i class="bx bx-send"></i>
                                    <span>Применить</span>
                                </button>
                            </div>

                            <div class="invoice-action-btn mb-1">
                                <button type="submit" name="redirect" value="save" class="btn btn-success btn-block">
                                    <i class='bx bx-save'></i>
                                    <span>Сохранить</span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="invoice-payment">
                        <div class="invoice-payment-option mb-2">
                            <h6>Раздел</h6>
                            <select name="lavel_id" class="form-control ">
                                <option value="1">Debit Card</option>
                                <option value="2">Credit Card</option>
                                <option value="3">Paypal</option>
                                <option value="4">Internet Banking</option>
                                <option value="5">UPI Transfer</option>
                            </select>
                        </div>

                        <hr>

                        <div class="invoice-payment-option mb-2">
                            <label class="@isset($doc->date_pod) text-success @endisset">Дата подписания</label>
                            <fieldset class="form-group position-relative has-icon-left">
                                <input type="text" name="date_pod" class="form-control pickadate-months-year"
                                       placeholder="Выберите дату"
                                       value="{{isset($doc->date_pod)?$doc->date_pod->format('d/m/Y'):''}}"/>
                                <div class="form-control-position">
                                    <i class='bx bx-calendar'></i>
                                </div>
                            </fieldset>
                        </div>

                        <div class="invoice-payment-option mb-2">
                            <label class="@isset($doc->date_pub) text-success @endisset">Дата публикации </label>
                            <fieldset class="form-group position-relative has-icon-left">
                                <input type="text" name="date_pub" class="form-control pickadate-months-year"
                                       placeholder="Выберите дату"
                                       value="{{isset($doc->date_pub)?$doc->date_pub->format('d/m/Y'):''}}"/>

                                <div class="form-control-position">
                                    <i class='bx bx-calendar'></i>
                                </div>
                            </fieldset>
                        </div>

                        <div class="invoice-payment-option mb-2">
                            <label class="@isset($doc->date_vst) text-success @endisset">Дата вступления в силу </label>
                            <fieldset class="form-group position-relative has-icon-left">
                                <input type="text" name="date_vst"
                                       value="{{isset($doc->date_vst)?$doc->date_vst->format('d/m/Y'):''}}"
                                       class="form-control  pickadate-months-year" placeholder="Выберите дату">
                                <div class="form-control-position">
                                    <i class='bx bx-calendar'></i>
                                </div>
                            </fieldset>
                        </div>

                        <div class="invoice-payment-option mb-2">
                            <label class="@isset($doc->date_end_vst) text-success @endisset">
                                Дата окончания действия </label>

                            <fieldset class="form-group position-relative has-icon-left">
                                <input type="text" name="date_end_vst"
                                       value="{{isset($doc->date_end_vst)?$doc->date_end_vst->format('d/m/Y'):''}}"
                                       class="form-control  pickadate-months-year" placeholder="Выберите дату">
                                <div class="form-control-position">
                                    <i class='bx bx-calendar'></i>
                                </div>
                            </fieldset>
                        </div>
                        <hr>
                        <div class="invoice-payment-option mb-2">
                            <label class="@isset($doc->date_npub) text-success @endisset">Начало публикации на
                                сайте</label>

                            <fieldset class="form-group position-relative has-icon-left">
                                <input type="text" name="date_npub"
                                       value="{{isset($doc->date_npub)?$doc->date_npub->format('d/m/Y'):now()->format('d/m/Y')}}"
                                       class="form-control  pickadate-months-year" placeholder="Выберите дату">
                                <div class="form-control-position">
                                    <i class='bx bx-calendar'></i>
                                </div>
                            </fieldset>
                        </div>
                        <div class="invoice-payment-option mb-2">
                            <label class="@isset($doc->date_kpub) text-success @endisset">Окончание публикации на
                                сайте</label>
                            <fieldset class="form-group position-relative has-icon-left">
                                <input type="text" name="date_kpub"
                                       value="{{isset($doc->date_kpub)?$doc->date_kpub->format('d/m/Y'):''}}"
                                       class="form-control  pickadate-months-year" placeholder="Выберите дату">
                                <div class="form-control-position">
                                    <i class='bx bx-calendar'></i>
                                </div>
                            </fieldset>
                        </div>


                        <div class="invoice-terms">
                            <div class="d-flex justify-content-between py-50">
                                <span class="invoice-terms-title">Опубликовать</span>
                                <div class="custom-control custom-switch custom-switch-glow">
                                    <input type="checkbox" name="pub" class="custom-control-input"
                                           id="checkedPub" {{!empty($doc->pub)?'checked':''}}>
                                    <label class="custom-control-label" for="checkedPub">
                                    </label>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between py-50">
                                <span class="invoice-terms-title">Уведомить</span>

                                <div class="custom-control custom-switch custom-switch-glow">
                                    <input type="checkbox" class="custom-control-input" name="notify"
                                           id="clientNote" {{!empty($doc->notify)?'checked':''}}>
                                    <label class="custom-control-label" for="clientNote">
                                    </label>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between py-50">
                                <span class="invoice-terms-title">На главную</span>
                                <div class="custom-control custom-switch custom-switch-glow">
                                    <input type="checkbox" class="custom-control-input" id="paymentstub"
                                           name="in_main" {{!empty($doc->in_main)?'checked':''}}>
                                    <label class="custom-control-label" for="paymentstub">
                                    </label>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <h6>Автор</h6>
                        <div class="form-group">
                            <select class=" form-control" disabled>

                                <option value="square">{{Auth::user()->name}}</option>


                            </select>
                        </div>
                        <hr>
                        <div class="invoice-terms">
                            <div class="d-flex justify-content-between py-50">
                                <span class="invoice-terms-title">Удалить -консультант-</span>
                                <div class="custom-control custom-switch custom-switch-glow">
                                    <input type="checkbox" name="delete_consultant" class="custom-control-input"
                                           id="delete_consultant" >
                                    <label class="custom-control-label" for="delete_consultant">
                                    </label>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between py-50">
                                <span class="invoice-terms-title">Удалить ссылки</span>

                                <div class="custom-control custom-switch custom-switch-glow">
                                    <input type="checkbox" class="custom-control-input" name="delete_a"
                                           id="delete_a">
                                    <label class="custom-control-label" for="delete_a">
                                    </label>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between py-50">
                                <span class="invoice-terms-title">Удалить пробелы</span>
                                <div class="custom-control custom-switch custom-switch-glow">
                                    <input type="checkbox" class="custom-control-input" id="delete_probel"
                                           name="delete_probel">
                                    <label class="custom-control-label" for="delete_probel">
                                    </label>
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>
            </div>

        </form>
    </section>
@endsection




{{-- vendor scripts --}}
@section('vendor-scripts')
    <!-- BEGIN: Page Vendor JS-->




    <script src="/adm/app-assets/vendors/js/pickers/pickadate/picker.js"></script>
    <script src="/adm/app-assets/vendors/js/pickers/pickadate/picker.date.js"></script>
    <script src="/adm/app-assets/vendors/js/pickers/pickadate/picker.time.js"></script>
    <script src="/adm/app-assets/vendors/js/pickers/pickadate/legacy.js"></script>


    <script src="/adm/app-assets/vendors/js/forms/repeater/jquery.repeater.min.js"></script>

    <script src="/adm/app-assets/vendors/js/forms/select/select2.full.js"></script>
    <!-- END: Page Vendor JS-->
@endsection

{{-- page scripts --}}
@section('page-scripts')
    <!-- BEGIN: Page JS-->
    <script src="/adm/app-assets/js/doc.edit.js"></script>

    <script src="/adm/app-assets/js/scripts/forms/select/form-select2.js"></script>
    <!-- END: Page JS-->

    <script type="text/javascript" src="/CKE/ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="/CKE/ckfinder.js"></script>

    <script type="text/javascript">


        if (typeof CKEDITOR == 'undefined') {
            document.write('Error');
        } else {
            var editor = CKEDITOR.replace('editor1',
                {
                    toolbar:
                        [
                            ['Source', '-', 'NewPage', 'Preview'], ['PasteText', 'PasteFromWord', '-', 'SpellChecker', 'Scayt'], ['Undo', 'Redo', '-', 'Find', 'Replace', '-', 'SelectAll', 'RemoveFormat'], '/', ['Bold', 'Italic', 'Underline', 'Strike', '-', 'Subscript', 'Superscript'], ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', 'Blockquote'], ['JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'], ['Link', 'Unlink', 'Anchor'], ['Image', 'Table', 'HorizontalRule', 'SpecialChar'], '/', [, 'Format', 'Font', 'FontSize'], ['TextColor', 'BGColor'], ['Maximize', 'ShowBlocks', '-', 'About']
                        ]
                });
            CKFinder.setupCKEditor(editor, '/CKE/');
        }

    </script>
@endsection
