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
                        <form action="#" class="auth-form">
                            <div class="mb-3">
                                <label for="usernameInput" class="form-label">Имя</label>
                                <input type="text" class="form-control" id="usernameInput" placeholder="Укажите имя для связи" required>
                            </div>
                            <div class="mb-3">
                                <label for="passwordInput" class="form-label">Телефон</label>
                                <input type="text" class="form-control" id="emailInput" placeholder="Укажите номер телефона" required>
                            </div>
                            <div class="mb-3">
                                <label for="emailInput" class="form-label">Сообщение</label>
                                <textarea type="text" class="form-control" id="passwordInput" placeholder="Предмет заказа"></textarea>
                            </div>
                            <div class="mb-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="flexCheckDefault" required>
                                    <label class="form-check-label" for="flexCheckDefault">Согласен с  <a href="{{route('privacy-policy')}}" class="text-primary form-text text-decoration-underline">Политикой конфиденциальности</a></label>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary w-100">Заказать</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div><!--end modal-body-->
        </div><!--end modal-content-->
    </div><!--end modal-dialog-->
</div>
<!-- END SIGN-UP MODAL -->
