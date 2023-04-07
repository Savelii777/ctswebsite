$(function() {
    $(".nav-treeview .nav-link, .nav-link").each(function() {
        var location2 =
            window.location.protocol +
            "//" +
            window.location.host +
            window.location.pathname;
        var link = this.href;
        if (link == location2) {
            $(this).addClass("active");
            $(this)
                .parent()
                .parent()
                .parent()
                .addClass("menu-is-opening menu-open");
        }
    });

    $(".delete-btn").click(function() {
        var res = confirm(
            "Удаленную запись невозможно будет восстановить. Вы действительно хотите удалить ее?"
        );
        if (!res) {
            return false;
        }
    });
});

function generatePassword() {
    const randomstring = Math.random()
        .toString(36)
        .substr(2, 10);

    $("#password_input").val(randomstring);
}
    function generateUser() {
        const name = $("input[name='name']").val().toLowerCase();
        const translit = {
            'а': 'a', 'б': 'b', 'в': 'v', 'г': 'g', 'д': 'd', 'е': 'e',
            'ё': 'e', 'ж': 'zh', 'з': 'z', 'и': 'i', 'й': 'y', 'к': 'k',
            'л': 'l', 'м': 'm', 'н': 'n', 'о': 'o', 'п': 'p', 'р': 'r',
            'с': 's', 'т': 't', 'у': 'u', 'ф': 'f', 'х': 'h', 'ц': 'c',
            'ч': 'ch', 'ш': 'sh', 'щ': 'shch', 'ъ': '', 'ы': 'y', 'ь': '',
            'э': 'e', 'ю': 'yu', 'я': 'ya', ' ': '.'
        };
        const login = name.replace(/[а-яё]/g, letter => translit[letter]).replace(/\s+/g, '.');
        const randomstring = Math.random().toString(36).substr(2, 10);

        $("input[name='login']").val(login);
        $("#password_input").val(randomstring);
    }

