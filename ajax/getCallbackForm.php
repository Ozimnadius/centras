<form action="/ajax/sendForm.php"
      method="post"
      class="form"
      data-event="sendForm"
      data-validate>
    <div class="form__wrapper">
        <input type="hidden" name="params"
               value="{&quot;EVENT_NAME&quot;: &quot;SEND_FORM&quot;, &quot;FORM_NAME&quot;: &quot;Обратная связь&quot;, &quot;FIELDS&quot;: {&quot;name&quot;: &quot;Имя&quot;, &quot;tel&quot;: &quot;Телефон&quot;, &quot;email&quot;: &quot;Email&quot;}}">
        <div class="form__title">Обратная связь</div>
        <div class="form__fields">
            <div class="form__field">
                <label>Имя</label>
                <input type="text" name="name" >
            </div>
            <div class="form__field">
                <label><span style='color:var(--MainRed);'>*</span>Телефон</label>
                <input type="tel"
                       name="tel"
                       data-rule-required="true"
                       data-msg-required="Заполните это поле">
            </div>
            <div class="form__field">
                <label>Эл. почта</label>
                <input type="email" name="email">
            </div>
        </div>
        <div class="form__accept">
            <input type="checkbox" name="accept" id="accept" checked>
            <label for="accept">
                Я даю своё согласие на обработку персональных данных в соответствии с <a href="#">политикой
                    конфиденциальности</a>
            </label>
        </div>
        <button class="form__submit" type="submit">Отправить</button>
    </div>
</form>
<script>
    $('input[type="tel"]').inputmask("+7(999)999-99-99");
    $('[data-validate]').validate(
        {
            submitHandler: (form) => {
                let data = $(form).serialize();
                $.ajax({
                    dataType: "json",
                    type: "POST",
                    url: form.action,
                    data: data,
                    success: (result) => {
                        if (result.status) {
                            $.fancybox.close();
                            toastr["success"]("Мы скоро свяжемся с вами.", "Спасибо!");
                        } else {
                            alert('Что-то пошло не так, попробуйте еще раз!!!');
                        }
                    },
                    error: function (result) {
                        alert('Что-то пошло не так, попробуйте еще раз!!!');
                    }
                });
            },
        }
    );
</script>
