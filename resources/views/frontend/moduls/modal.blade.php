<!-- START SIGN-UP MODAL -->
<div class="modal fade" id="signupModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body p-5">
                <div class="position-absolute end-0 top-0 p-3">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="auth-content">
                    <div class="w-100">
                        <div class="text-center mb-4">
                            <h5>Форма заказа</h5>
                            <p class="text-muted">Оформление заказа и доставки в один клик</p>
                        </div>
                        <div class="alert  bg-soft-success" id="messagesentok" role="alert" style="display: none">
                            Сообщение отправлено
                        </div>
                        <form class="auth-form" id="orderform">
                            @csrf
                            <div class="mb-3">
                                <label for="nameInputOreder" class="form-label">Имя</label>
                                <input type="text" name="name" class="form-control" id="nameInputOreder" placeholder="Ваше имя" required>
                            </div>
                            <div class="mb-3">
                                <label for="telInputOreder" class="form-label">Телефон</label>
                                <input type="tel" name="tel" class="form-control" id="telInputOreder" placeholder="Номер телефона" required>
                            </div>
                            <div class="mb-3">
                                <label for="textInputOreder" class="form-label">Сообщение</label>
                                <textarea type="text" name="message" class="form-control" id="textInputOreder" placeholder="Предмет заказа"></textarea>
                            </div>
                            <div class="mb-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="flexCheckDefault" required>
                                    <label class="form-check-label" for="privacy_policy">
                                        Ознакомлен и полностью принимаю условия
                                        <a href="{{route('agreement')}}" target="_blank"
                                           style=" text-decoration: #fffdfe  solid underline">Пользовательского
                                            соглашения</a>,
                                        условия
                                        <a href="{{route('privacy-policy')}}" target="_blank" style=" text-decoration: #fffdfe solid underline">Политики
                                            конфиденциальности</a>,
                                        условия
                                        <a href="{{route('public-offer')}}" target="_blank" style=" text-decoration: #fffdfe solid underline">Публичной
                                            оферты</a>,
                                        даю согласие на обработку своих персональных данных
                                        и получение информационных сообщений, связанных с оказанием
                                        услуг


                                    </label>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary w-100" id="submitorder">Заказать</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div><!--end modal-body-->
        </div><!--end modal-content-->
    </div><!--end modal-dialog-->
</div>
<!-- END SIGN-UP MODAL -->

@section('page-scripts')
    @parent

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="/assets/js/jquery-ui.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $("#submitorder").click(function (e) {
                e.preventDefault();
                var _token = $("input[name='_token']").val();
                var tel = $("#telInputOreder").val();
                var check = ($('#flexCheckDefault').is(':checked')) ? 1 : null;
                var name = $("#nameInputOreder").val();
                var text = $("#textInputOreder").val();
                var err = false;


                if (!tel) {
                    $("#telInputOreder").effect("shake");
                    err = true;
                }
                if (!name) {
                    $("#nameInputOreder").effect("shake");
                    err = true;
                }
                if (!check) {
                    $("#flexCheckDefault").effect("shake");
                    err = true;
                }
                if (!err) {
                    $.ajax({
                        url: "{{ route('board.sendorder') }}",
                        type: 'POST',
                        data: {_token: _token, tel: tel, name: name, text: text, check: check},
                        success: function (data) {
                            console.log(data.error)

                            if ($.isEmptyObject(data.error)) {
                                //alert(data.success);
                                $('#messagesentok').show();
                                $('#orderform').hide();
                            } else {
                                printErrorMsg(data.error);
                            }
                        }
                    });
                }

            });

            function printErrorMsg(msg) {
                $.each(msg, function (key, value) {
                    $('.' + key + '_err').text(value);
                });
            }
        });
    </script>
@endsection
