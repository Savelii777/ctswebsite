/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */


require("./bootstrap");

window.Vue = require("vue");

import VueDragDrop from "vue-drag-drop";

Vue.use(VueDragDrop);

// Пагинация
Vue.component("pagination", require("laravel-vue-pagination"));

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
Vue.component(
    "percent-counter",
    require("./components/PercentCounter").default
);

Vue.component("line-progress", require("./components/LineProgress").default);


Vue.component("course", require("./components/Course.vue").default);
Vue.component("course-list", require("./components/CourseList.vue").default);

Vue.component(
    "user-personal-info-tab",
    require("./components/UserPersonalInfoTab.vue").default
);
Vue.component(
    "user-authorization-data-tab",
    require("./components/UserAuthorizationDataTab.vue").default
);
Vue.component("user-profile", require("./components/UserProfile.vue").default);

// Тесты продакшн
Vue.component(
    "test-1",
    require("./components/test1/TestWithQuestions.vue").default
);
Vue.component(
    "test-2",
    require("./components/test2/TestWithQuestions.vue").default
);
Vue.component(
    "test-3",
    require("./components/test3/TestWithQuestions.vue").default
);
Vue.component(
    "test-4",
    require("./components/test4/TestWithQuestions.vue").default
);
Vue.component(
    "test-5",
    require("./components/test5/TestWithQuestions.vue").default
);
Vue.component(
    "test-6",
    require("./components/test6/TestWithQuestions.vue").default
);
Vue.component(
    "test-7",
    require("./components/test7/TestWithQuestions.vue").default
);
Vue.component(
    "test-8",
    require("./components/test8/TestWithQuestions.vue").default
);
Vue.component(
    "test-9",
    require("./components/test9/TestWithQuestions.vue").default
);
Vue.component(
    "test-10",
    require("./components/test10/TestWithQuestions.vue").default
);
Vue.component(
    "test-11",
    require("./components/test11/TestWithQuestions.vue").default
);
Vue.component(
    "test-12",
    require("./components/test12/TestWithQuestions.vue").default
);
Vue.component(
    "test-13",
    require("./components/test13/TestWithQuestions.vue").default
);
Vue.component(
    "test-14",
    require("./components/test14/TestWithQuestions.vue").default
);
Vue.component(
    "test-15",
    require("./components/test15/TestWithQuestions.vue").default
);
Vue.component(
    "test-16",
    require("./components/test16/TestWithQuestions.vue").default
);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component("users", require("./components/Users.vue").default);

import SimpleVueValidation from "simple-vue-validator";

Vue.use(SimpleVueValidation);

import VueKonva from "vue-konva";

Vue.use(VueKonva);

import store from "../js/store";

const app = new Vue({
    store,
    el: "#app"
});

$("#button_hide_profile_info").click(function () {
    $(this)
        .children("div")
        .toggleClass("profile_visibity");
});

$('button[id*="button_hide_course_info_"]').each(function (index) {
    $(this).on("click", function () {
        $(this)
            .children("div")
            .toggleClass("profile_visibity");
    });
});


var swiper = new Swiper(".test-swiper", {
    autoHeight: true,
    allowTouchMove: false,
    navigation: {
        nextEl: ".test-button-next",
        prevEl: ".test-button-prev",
    },
});

