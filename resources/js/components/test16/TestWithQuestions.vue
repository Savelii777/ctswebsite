<template>
    <form
        v-on:submit.prevent="submit"
        class="offset-lg-1 col-lg-7 materials-block pass-tests"
    >
        <p class="tests-title">Тест по теме "{{ chapter.title }}"</p>
        <ul class="tests-list">
            <li class="tests-item">
                <p>
                    всего вопросов
                </p>
                <div>
                    {{ questions }}
                </div>
            </li>
            <li class="tests-item">
                <p>
                    правильных ответов для зачета
                </p>
                <div>
                    {{ test.min_correct }}
                </div>
            </li>
            <li class="tests-item">
                <p>
                    время на выполение
                </p>
                <div>{{ test.minutes }} минут</div>
            </li>
        </ul>
        <div
            v-if="loading"
            class="row"
            style="display: flex; justify-content: center;"
        >
            <div
                style="width: 3rem; height: 3rem; color: deepskyblue!important;"
                class="spinner-grow text-light"
                role="status"
            >
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!--        <div class="timer-block" v-if="!loading && !completed">-->
        <!--            <div class="row">-->
        <!--                <p>-->
        <!--                    до окончания теста-->
        <!--                </p>-->
        <!--                <Timer-->
        <!--                    :hours="hours"-->
        <!--                    :minutes="minutes"-->
        <!--                    :seconds="seconds"-->
        <!--                    v-on:late="submit"-->
        <!--                />-->
        <!--            </div>-->
        <!--        </div>-->
        <div v-if="test_good && completed" class="tests-good tests mb-3">
            <div>
                <button
                    type="button"
                    style="color:white;"
                    class="btn-active btn btn-good"
                >
                    Тест сдан
                </button>
                <p>
                    верных ответов <b>{{ correct_answers }}</b>
                </p>
            </div>
            <div>
                <button
                    @click="startTest"
                    type="button"
                    style="color: black"
                    class="btn-active"
                >
                    Сдать еще раз
                </button>
            </div>
        </div>
        <div v-if="test_bad && completed" class="tests-bad tests mb-3">
            <div>
                <button
                    style="color:white;"
                    type="button"
                    class="btn-active btn btn-bad"
                >
                    Тест не сдан
                </button>
                <p>
                    верных ответов <b>{{ correct_answers }}</b>
                </p>
            </div>
            <div>
                <button
                    @click="startTest"
                    type="button"
                    class="btn-active"
                    style="color: black"
                >
                    Пересдать
                </button>
            </div>
        </div>
        <div v-show="!loading" id="test" class="swiper test-swiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide test-slide">
                    <question-test
                        number="01"
                        from="94"
                        v-on:answer="handlerAnswers"
                        :completed="completed"
                        :serverAnswers="result"
                        :questions="questions"
                        ordinalNumber="01"
                    ></question-test>
                </div>
                <div class="swiper-slide test-slide">
                    <question-test-2
                        number="02"
                        from="94"
                        v-on:answer="handlerAnswers"
                        :completed="completed"
                        :serverAnswers="result"
                        :questions="questions"
                        ordinalNumber="02"
                    ></question-test-2>
                </div>
                <div class="swiper-slide test-slide">
                    <question-test-3
                        number="03"
                        from="94"
                        v-on:answer="handlerAnswers"
                        :completed="completed"
                        :serverAnswers="result"
                        :questions="questions"
                        ordinalNumber="03"
                    ></question-test-3>
                </div>
                <div class="swiper-slide test-slide">
                    <question-test-4
                        number="04"
                        from="94"
                        v-on:answer="handlerAnswers"
                        :completed="completed"
                        :serverAnswers="result"
                        :questions="questions"
                        ordinalNumber="04"
                    ></question-test-4>
                </div>
                <div class="swiper-slide test-slide">
                    <question-test-5
                        number="05"
                        from="94"
                        v-on:answer="handlerAnswers"
                        :completed="completed"
                        :serverAnswers="result"
                        :questions="questions"
                        ordinalNumber="05"
                    ></question-test-5>
                </div>
                <div class="swiper-slide test-slide">
                    <question-test-6
                        number="06"
                        from="94"
                        v-on:answer="handlerAnswers"
                        :completed="completed"
                        :serverAnswers="result"
                        :questions="questions"
                        ordinalNumber="06"
                    ></question-test-6>
                </div>
                <div class="swiper-slide test-slide">
                    <question-test-7
                        number="07"
                        from="94"
                        v-on:answer="handlerAnswers"
                        :completed="completed"
                        :serverAnswers="result"
                        :questions="questions"
                        ordinalNumber="07"
                    ></question-test-7>
                </div>
                <div class="swiper-slide test-slide">
                    <question-test-8
                        number="08"
                        from="94"
                        v-on:answer="handlerAnswers"
                        :completed="completed"
                        :serverAnswers="result"
                        :questions="questions"
                        ordinalNumber="08"
                    ></question-test-8>
                </div>
                <div class="swiper-slide test-slide">
                    <question-test-9
                        number="09"
                        from="94"
                        v-on:answer="handlerAnswers"
                        :completed="completed"
                        :serverAnswers="result"
                        :questions="questions"
                        ordinalNumber="09"
                    ></question-test-9>
                </div>
                <div class="swiper-slide test-slide">
                    <question-test-10
                        number="10"
                        from="94"
                        v-on:answer="handlerAnswers"
                        :completed="completed"
                        :serverAnswers="result"
                        :questions="questions"
                        ordinalNumber="10"
                    ></question-test-10>
                </div>
                <div class="swiper-slide test-slide">
                    <question-test-11
                        number="11"
                        from="94"
                        v-on:answer="handlerAnswers"
                        :completed="completed"
                        :serverAnswers="result"
                        :questions="questions"
                        ordinalNumber="11"
                    ></question-test-11>
                </div>
                <div class="swiper-slide test-slide">
                    <question-test-12
                        number="12"
                        from="94"
                        v-on:answer="handlerAnswers"
                        :completed="completed"
                        :serverAnswers="result"
                        :questions="questions"
                        ordinalNumber="12"
                    ></question-test-12>
                </div>
                <div class="swiper-slide test-slide">
                    <question-test-13
                        number="13"
                        from="94"
                        v-on:answer="handlerAnswers"
                        :completed="completed"
                        :serverAnswers="result"
                        :questions="questions"
                        ordinalNumber="13"
                    ></question-test-13>
                </div>
                <div class="swiper-slide test-slide">
                    <question-test-14
                        number="14"
                        from="94"
                        v-on:answer="handlerAnswers"
                        :completed="completed"
                        :serverAnswers="result"
                        :questions="questions"
                        ordinalNumber="14"
                    ></question-test-14>
                </div>
                <div class="swiper-slide test-slide">
                    <question-test-15
                        number="15"
                        from="94"
                        v-on:answer="handlerAnswers"
                        :completed="completed"
                        :serverAnswers="result"
                        :questions="questions"
                        ordinalNumber="15"
                    ></question-test-15>
                </div>
                <div class="swiper-slide test-slide">
                    <question-test-16
                        number="16"
                        from="94"
                        v-on:answer="handlerAnswers"
                        :completed="completed"
                        :serverAnswers="result"
                        :questions="questions"
                        ordinalNumber="16"
                    ></question-test-16>
                </div>
                <div class="swiper-slide test-slide">
                    <question-test-17
                        number="17"
                        from="94"
                        v-on:answer="handlerAnswers"
                        :completed="completed"
                        :serverAnswers="result"
                        :questions="questions"
                        ordinalNumber="17"
                    ></question-test-17>
                </div>
                <div class="swiper-slide test-slide">
                    <question-test-18
                        number="18"
                        from="94"
                        v-on:answer="handlerAnswers"
                        :completed="completed"
                        :serverAnswers="result"
                        :questions="questions"
                        ordinalNumber="18"
                    ></question-test-18>
                </div>
                <div class="swiper-slide test-slide">
                    <question-test-19
                        number="19"
                        from="94"
                        v-on:answer="handlerAnswers"
                        :completed="completed"
                        :serverAnswers="result"
                        :questions="questions"
                        ordinalNumber="19"
                    ></question-test-19>
                </div>
                <div class="swiper-slide test-slide">
                    <question-test-20
                        number="20"
                        from="94"
                        v-on:answer="handlerAnswers"
                        :completed="completed"
                        :serverAnswers="result"
                        :questions="questions"
                        ordinalNumber="20"
                    ></question-test-20>
                </div>
                <div class="swiper-slide test-slide">
                    <question-test-21
                        number="21"
                        from="94"
                        v-on:answer="handlerAnswers"
                        :completed="completed"
                        :serverAnswers="result"
                        :questions="questions"
                        ordinalNumber="21"
                    ></question-test-21>
                </div>
                <div class="swiper-slide test-slide">
                    <question-test-22
                        number="22"
                        from="94"
                        v-on:answer="handlerAnswers"
                        :completed="completed"
                        :serverAnswers="result"
                        :questions="questions"
                        ordinalNumber="22"
                    ></question-test-22>
                </div>
                <div class="swiper-slide test-slide">
                    <question-test-23
                        number="23"
                        from="94"
                        v-on:answer="handlerAnswers"
                        :completed="completed"
                        :serverAnswers="result"
                        :questions="questions"
                        ordinalNumber="23"
                    ></question-test-23>
                </div>
                <div class="swiper-slide test-slide">
                    <question-test-24
                        number="24"
                        from="94"
                        v-on:answer="handlerAnswers"
                        :completed="completed"
                        :serverAnswers="result"
                        :questions="questions"
                        ordinalNumber="24"
                    ></question-test-24>
                </div>
                <div class="swiper-slide test-slide">
                    <question-test-25
                        number="25"
                        from="94"
                        v-on:answer="handlerAnswers"
                        :completed="completed"
                        :serverAnswers="result"
                        :questions="questions"
                        ordinalNumber="25"
                    ></question-test-25>
                </div>
                <div class="swiper-slide test-slide">
                    <question-test-26
                        number="26"
                        from="94"
                        v-on:answer="handlerAnswers"
                        :completed="completed"
                        :serverAnswers="result"
                        :questions="questions"
                        ordinalNumber="26"
                    ></question-test-26>
                </div>
                <div class="swiper-slide test-slide">
                    <question-test-27
                        number="27"
                        from="94"
                        v-on:answer="handlerAnswers"
                        :completed="completed"
                        :serverAnswers="result"
                        :questions="questions"
                        ordinalNumber="27"
                    ></question-test-27>
                </div>
                <div class="swiper-slide test-slide">
                    <question-test-28
                        number="28"
                        from="94"
                        v-on:answer="handlerAnswers"
                        :completed="completed"
                        :serverAnswers="result"
                        :questions="questions"
                        ordinalNumber="28"
                    ></question-test-28>
                </div>
                <div class="swiper-slide test-slide">
                    <question-test-29
                        number="29"
                        from="94"
                        v-on:answer="handlerAnswers"
                        :completed="completed"
                        :serverAnswers="result"
                        :questions="questions"
                        ordinalNumber="29"
                    ></question-test-29>
                </div>
                <div class="swiper-slide test-slide">
                    <question-test-30
                        number="30"
                        from="94"
                        v-on:answer="handlerAnswers"
                        :completed="completed"
                        :serverAnswers="result"
                        :questions="questions"
                        ordinalNumber="30"
                    ></question-test-30>
                </div>
                <div class="swiper-slide test-slide">
                    <question-test-31
                        number="31"
                        from="94"
                        v-on:answer="handlerAnswers"
                        :completed="completed"
                        :serverAnswers="result"
                        :questions="questions"
                        ordinalNumber="31"
                    ></question-test-31>
                </div>
                <div class="swiper-slide test-slide">
                    <question-test-32
                        number="32"
                        from="94"
                        v-on:answer="handlerAnswers"
                        :completed="completed"
                        :serverAnswers="result"
                        :questions="questions"
                        ordinalNumber="32"
                    ></question-test-32>
                </div>
                <div class="swiper-slide test-slide">
                    <question-test-33
                        number="33"
                        from="94"
                        v-on:answer="handlerAnswers"
                        :completed="completed"
                        :serverAnswers="result"
                        :questions="questions"
                        ordinalNumber="33"
                    ></question-test-33>
                </div>
                <div class="swiper-slide test-slide">
                    <question-test-34
                        number="34"
                        from="94"
                        v-on:answer="handlerAnswers"
                        :completed="completed"
                        :serverAnswers="result"
                        :questions="questions"
                        ordinalNumber="34"
                    ></question-test-34>
                </div>
                <div class="swiper-slide test-slide">
                    <question-test-35
                        number="35"
                        from="94"
                        v-on:answer="handlerAnswers"
                        :completed="completed"
                        :serverAnswers="result"
                        :questions="questions"
                        ordinalNumber="35"
                    ></question-test-35>
                </div>
                <div class="swiper-slide test-slide">
                    <question-test-36
                        number="36"
                        from="94"
                        v-on:answer="handlerAnswers"
                        :completed="completed"
                        :serverAnswers="result"
                        :questions="questions"
                        ordinalNumber="36"
                    ></question-test-36>
                </div>
                <div class="swiper-slide test-slide">
                    <question-test-37
                        number="37"
                        from="94"
                        v-on:answer="handlerAnswers"
                        :completed="completed"
                        :serverAnswers="result"
                        :questions="questions"
                        ordinalNumber="37"
                    ></question-test-37>
                </div>
                <div class="swiper-slide test-slide">
                    <question-test-38
                        number="38"
                        from="94"
                        v-on:answer="handlerAnswers"
                        :completed="completed"
                        :serverAnswers="result"
                        :questions="questions"
                        ordinalNumber="38"
                    ></question-test-38>
                </div>
                <div class="swiper-slide test-slide">
                    <question-test-39
                        number="39"
                        from="94"
                        v-on:answer="handlerAnswers"
                        :completed="completed"
                        :serverAnswers="result"
                        :questions="questions"
                        ordinalNumber="39"
                    ></question-test-39>
                </div>
                <div class="swiper-slide test-slide">
                    <question-test-40
                        number="40"
                        from="94"
                        v-on:answer="handlerAnswers"
                        :completed="completed"
                        :serverAnswers="result"
                        :questions="questions"
                        ordinalNumber="40"
                    ></question-test-40>
                </div>
                <div class="swiper-slide test-slide">
                    <question-test-41
                        number="41"
                        from="94"
                        v-on:answer="handlerAnswers"
                        :completed="completed"
                        :serverAnswers="result"
                        :questions="questions"
                        ordinalNumber="41"
                    ></question-test-41>
                </div>
                <div class="swiper-slide test-slide">
                    <question-test-42
                        number="42"
                        from="94"
                        v-on:answer="handlerAnswers"
                        :completed="completed"
                        :serverAnswers="result"
                        :questions="questions"
                        ordinalNumber="42"
                    ></question-test-42>
                </div>
                <div class="swiper-slide test-slide">
                    <question-test-43
                        number="43"
                        from="94"
                        v-on:answer="handlerAnswers"
                        :completed="completed"
                        :serverAnswers="result"
                        :questions="questions"
                        ordinalNumber="43"
                    ></question-test-43>
                </div>
                <div class="swiper-slide test-slide">
                    <question-test-44
                        number="44"
                        from="94"
                        v-on:answer="handlerAnswers"
                        :completed="completed"
                        :serverAnswers="result"
                        :questions="questions"
                        ordinalNumber="44"
                    ></question-test-44>
                </div>
                <div class="swiper-slide test-slide">
                    <question-test-45
                        number="45"
                        from="94"
                        v-on:answer="handlerAnswers"
                        :completed="completed"
                        :serverAnswers="result"
                        :questions="questions"
                        ordinalNumber="45"
                    ></question-test-45>
                </div>
                <div class="swiper-slide test-slide">
                    <question-test-46
                        number="46"
                        from="94"
                        v-on:answer="handlerAnswers"
                        :completed="completed"
                        :serverAnswers="result"
                        :questions="questions"
                        ordinalNumber="46"
                    ></question-test-46>
                </div>
                <div class="swiper-slide test-slide">
                    <question-test-47
                        number="47"
                        from="94"
                        v-on:answer="handlerAnswers"
                        :completed="completed"
                        :serverAnswers="result"
                        :questions="questions"
                        ordinalNumber="47"
                    ></question-test-47>
                </div>
                <div class="swiper-slide test-slide">
                    <question-test-48
                        number="48"
                        from="94"
                        v-on:answer="handlerAnswers"
                        :completed="completed"
                        :serverAnswers="result"
                        :questions="questions"
                        ordinalNumber="48"
                    ></question-test-48>
                </div>
                <div class="swiper-slide test-slide">
                    <question-test-49
                        number="49"
                        from="94"
                        v-on:answer="handlerAnswers"
                        :completed="completed"
                        :serverAnswers="result"
                        :questions="questions"
                        ordinalNumber="49"
                    ></question-test-49>
                </div>
                <div class="swiper-slide test-slide">
                    <question-test-50
                        number="50"
                        from="94"
                        v-on:answer="handlerAnswers"
                        :completed="completed"
                        :serverAnswers="result"
                        :questions="questions"
                        ordinalNumber="50"
                    ></question-test-50>
                </div>
                <div class="swiper-slide test-slide">
                    <question-test-51
                        number="51"
                        from="94"
                        v-on:answer="handlerAnswers"
                        :completed="completed"
                        :serverAnswers="result"
                        :questions="questions"
                        ordinalNumber="51"
                    ></question-test-51>
                </div>
                <div class="swiper-slide test-slide">
                    <question-test-52
                        number="52"
                        from="94"
                        v-on:answer="handlerAnswers"
                        :completed="completed"
                        :serverAnswers="result"
                        :questions="questions"
                        ordinalNumber="52"
                    ></question-test-52>
                </div>
                <div class="swiper-slide test-slide">
                    <question-test-53
                        number="53"
                        from="94"
                        v-on:answer="handlerAnswers"
                        :completed="completed"
                        :serverAnswers="result"
                        :questions="questions"
                        ordinalNumber="53"
                    ></question-test-53>
                </div>
                <div class="swiper-slide test-slide">
                    <question-test-54
                        number="54"
                        from="94"
                        v-on:answer="handlerAnswers"
                        :completed="completed"
                        :serverAnswers="result"
                        :questions="questions"
                        ordinalNumber="54"
                    ></question-test-54>
                </div>
                <div class="swiper-slide test-slide">
                    <question-test-55
                        number="55"
                        from="94"
                        v-on:answer="handlerAnswers"
                        :completed="completed"
                        :serverAnswers="result"
                        :questions="questions"
                        ordinalNumber="55"
                    ></question-test-55>
                </div>
                <div class="swiper-slide test-slide">
                    <question-test-56
                        number="56"
                        from="94"
                        v-on:answer="handlerAnswers"
                        :completed="completed"
                        :serverAnswers="result"
                        :questions="questions"
                        ordinalNumber="56"
                    ></question-test-56>
                </div>
                <div class="swiper-slide test-slide">
                    <question-test-57
                        number="57"
                        from="94"
                        v-on:answer="handlerAnswers"
                        :completed="completed"
                        :serverAnswers="result"
                        :questions="questions"
                        ordinalNumber="57"
                    ></question-test-57>
                </div>
                <div class="swiper-slide test-slide">
                    <question-test-58
                        number="58"
                        from="94"
                        v-on:answer="handlerAnswers"
                        :completed="completed"
                        :serverAnswers="result"
                        :questions="questions"
                        ordinalNumber="58"
                    ></question-test-58>
                </div>
                <div class="swiper-slide test-slide">
                    <question-test-59
                        number="59"
                        from="94"
                        v-on:answer="handlerAnswers"
                        :completed="completed"
                        :serverAnswers="result"
                        :questions="questions"
                        ordinalNumber="59"
                    ></question-test-59>
                </div>
                <div class="swiper-slide test-slide">
                    <question-test-60
                        number="60"
                        from="94"
                        v-on:answer="handlerAnswers"
                        :completed="completed"
                        :serverAnswers="result"
                        :questions="questions"
                        ordinalNumber="60"
                    ></question-test-60>
                </div>
                <div class="swiper-slide test-slide">
                    <question-test-61
                        number="61"
                        from="94"
                        v-on:answer="handlerAnswers"
                        :completed="completed"
                        :serverAnswers="result"
                        :questions="questions"
                        ordinalNumber="61"
                    ></question-test-61>
                </div>
                <div class="swiper-slide test-slide">
                    <question-test-62
                        number="62"
                        from="94"
                        v-on:answer="handlerAnswers"
                        :completed="completed"
                        :serverAnswers="result"
                        :questions="questions"
                        ordinalNumber="62"
                    ></question-test-62>
                </div>
                <div class="swiper-slide test-slide">
                    <question-test-63
                        number="63"
                        from="94"
                        v-on:answer="handlerAnswers"
                        :completed="completed"
                        :serverAnswers="result"
                        :questions="questions"
                        ordinalNumber="63"
                    ></question-test-63>
                </div>
                <div class="swiper-slide test-slide">
                    <question-test-64
                        number="64"
                        from="94"
                        v-on:answer="handlerAnswers"
                        :completed="completed"
                        :serverAnswers="result"
                        :questions="questions"
                        ordinalNumber="64"
                    ></question-test-64>
                </div>
                <div class="swiper-slide test-slide">
                    <question-test-65
                        number="65"
                        from="94"
                        v-on:answer="handlerAnswers"
                        :completed="completed"
                        :serverAnswers="result"
                        :questions="questions"
                        ordinalNumber="65"
                    ></question-test-65>
                </div>
                <div class="swiper-slide test-slide">
                    <question-test-66
                        number="66"
                        from="94"
                        v-on:answer="handlerAnswers"
                        :completed="completed"
                        :serverAnswers="result"
                        :questions="questions"
                        ordinalNumber="66"
                    ></question-test-66>
                </div>
                <div class="swiper-slide test-slide">
                    <question-test-67
                        number="67"
                        from="94"
                        v-on:answer="handlerAnswers"
                        :completed="completed"
                        :serverAnswers="result"
                        :questions="questions"
                        ordinalNumber="67"
                    ></question-test-67>
                </div>
                <div class="swiper-slide test-slide">
                    <question-test-68
                        number="68"
                        from="94"
                        v-on:answer="handlerAnswers"
                        :completed="completed"
                        :serverAnswers="result"
                        :questions="questions"
                        ordinalNumber="68"
                    ></question-test-68>
                </div>
                <div class="swiper-slide test-slide">
                    <question-test-69
                        number="69"
                        from="94"
                        v-on:answer="handlerAnswers"
                        :completed="completed"
                        :serverAnswers="result"
                        :questions="questions"
                        ordinalNumber="69"
                    ></question-test-69>
                </div>
                <div class="swiper-slide test-slide">
                    <question-test-70
                        number="70"
                        from="94"
                        v-on:answer="handlerAnswers"
                        :completed="completed"
                        :serverAnswers="result"
                        :questions="questions"
                        ordinalNumber="70"
                    ></question-test-70>
                </div>
                <div class="swiper-slide test-slide">
                    <question-test-71
                        number="71"
                        from="94"
                        v-on:answer="handlerAnswers"
                        :completed="completed"
                        :serverAnswers="result"
                        :questions="questions"
                        ordinalNumber="71"
                    ></question-test-71>
                </div>
                <div class="swiper-slide test-slide">
                    <question-test-72
                        number="72"
                        from="94"
                        v-on:answer="handlerAnswers"
                        :completed="completed"
                        :serverAnswers="result"
                        :questions="questions"
                        ordinalNumber="72"
                    ></question-test-72>
                </div>
                <div class="swiper-slide test-slide">
                    <question-test-73
                        number="73"
                        from="94"
                        v-on:answer="handlerAnswers"
                        :completed="completed"
                        :serverAnswers="result"
                        :questions="questions"
                        ordinalNumber="73"
                    ></question-test-73>
                </div>
                <div class="swiper-slide test-slide">
                    <question-test-74
                        number="74"
                        from="94"
                        v-on:answer="handlerAnswers"
                        :completed="completed"
                        :serverAnswers="result"
                        :questions="questions"
                        ordinalNumber="74"
                    ></question-test-74>
                </div>
                <div class="swiper-slide test-slide">
                    <question-test-75
                        number="75"
                        from="94"
                        v-on:answer="handlerAnswers"
                        :completed="completed"
                        :serverAnswers="result"
                        :questions="questions"
                        ordinalNumber="75"
                    ></question-test-75>
                </div>
                <div class="swiper-slide test-slide">
                    <question-test-76
                        number="76"
                        from="94"
                        v-on:answer="handlerAnswers"
                        :completed="completed"
                        :serverAnswers="result"
                        :questions="questions"
                        ordinalNumber="76"
                    ></question-test-76>
                </div>
                <div class="swiper-slide test-slide">
                    <question-test-77
                        number="77"
                        from="94"
                        v-on:answer="handlerAnswers"
                        :completed="completed"
                        :serverAnswers="result"
                        :questions="questions"
                        ordinalNumber="77"
                    ></question-test-77>
                </div>
                <div class="swiper-slide test-slide">
                    <question-test-78
                        number="78"
                        from="94"
                        v-on:answer="handlerAnswers"
                        :completed="completed"
                        :serverAnswers="result"
                        :questions="questions"
                        ordinalNumber="78"
                    ></question-test-78>
                </div>
                <div class="swiper-slide test-slide">
                    <question-test-79
                        number="79"
                        from="94"
                        v-on:answer="handlerAnswers"
                        :completed="completed"
                        :serverAnswers="result"
                        :questions="questions"
                        ordinalNumber="79"
                    ></question-test-79>
                </div>
                <div class="swiper-slide test-slide">
                    <question-test-80
                        number="80"
                        from="94"
                        v-on:answer="handlerAnswers"
                        :completed="completed"
                        :serverAnswers="result"
                        :questions="questions"
                        ordinalNumber="80"
                    ></question-test-80>
                </div>
                <div class="swiper-slide test-slide">
                    <question-test-81
                        number="81"
                        from="94"
                        v-on:answer="handlerAnswers"
                        :completed="completed"
                        :serverAnswers="result"
                        :questions="questions"
                        ordinalNumber="81"
                    ></question-test-81>
                </div>
                <div class="swiper-slide test-slide">
                    <question-test-84
                        number="84"
                        from="94"
                        v-on:answer="handlerAnswers"
                        :completed="completed"
                        :serverAnswers="result"
                        :questions="questions"
                        ordinalNumber="82"
                    ></question-test-84>
                </div>
                <div class="swiper-slide test-slide">
                    <question-test-85
                        number="85"
                        from="94"
                        v-on:answer="handlerAnswers"
                        :completed="completed"
                        :serverAnswers="result"
                        :questions="questions"
                        ordinalNumber="83"
                    ></question-test-85>
                </div>
                <div class="swiper-slide test-slide">
                    <question-test-86
                        number="86"
                        from="94"
                        v-on:answer="handlerAnswers"
                        :completed="completed"
                        :serverAnswers="result"
                        :questions="questions"
                        ordinalNumber="84"
                    ></question-test-86>
                </div>
                <div class="swiper-slide test-slide">
                    <question-test-87
                        number="87"
                        from="94"
                        v-on:answer="handlerAnswers"
                        :completed="completed"
                        :serverAnswers="result"
                        :questions="questions"
                        ordinalNumber="85"
                    ></question-test-87>
                </div>
                <div class="swiper-slide test-slide">
                    <question-test-88
                        number="88"
                        from="94"
                        v-on:answer="handlerAnswers"
                        :completed="completed"
                        :serverAnswers="result"
                        :questions="questions"
                        ordinalNumber="86"
                    ></question-test-88>
                </div>
                <div class="swiper-slide test-slide">
                    <question-test-89
                        number="89"
                        from="94"
                        v-on:answer="handlerAnswers"
                        :completed="completed"
                        :serverAnswers="result"
                        :questions="questions"
                        ordinalNumber="87"
                    ></question-test-89>
                </div>
                <div class="swiper-slide test-slide">
                    <question-test-91
                        number="91"
                        from="94"
                        v-on:answer="handlerAnswers"
                        :completed="completed"
                        :serverAnswers="result"
                        :questions="questions"
                        ordinalNumber="88"
                    ></question-test-91>
                </div>
                <div class="swiper-slide test-slide">
                    <question-test-92
                        number="92"
                        from="94"
                        v-on:answer="handlerAnswers"
                        :completed="completed"
                        :serverAnswers="result"
                        :questions="questions"
                        ordinalNumber="89"
                    ></question-test-92>
                </div>
                <div class="swiper-slide test-slide">
                    <question-test-93
                        number="93"
                        from="94"
                        v-on:answer="handlerAnswers"
                        :completed="completed"
                        :serverAnswers="result"
                        :questions="questions"
                        ordinalNumber="90"
                    ></question-test-93>
                </div>
                <div class="swiper-slide test-slide">
                    <question-test-94
                        number="94"
                        from="94"
                        v-on:answer="handlerAnswers"
                        :completed="completed"
                        :serverAnswers="result"
                        :questions="questions"
                        ordinalNumber="91"
                    ></question-test-94>
                </div>
            </div>
        </div>
        <div v-show="!loading && !completed" class="test-button__blok test-button__blok_space-between">
            <div class="swiper-navigation">
                <button class="test-button-prev">
                    <svg width="20" height="29" viewBox="0 0 20 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M18.925 18.2441C18.3725 17.6916 17.48 17.6916 16.9275 18.2441L11.4167 23.7408V2.24992C11.4167 1.47075 10.7792 0.833252 10 0.833252C9.22085 0.833252 8.58335 1.47075 8.58335 2.24992V23.7549L3.08668 18.2583C2.53418 17.7058 1.64168 17.7058 1.08918 18.2583C0.53668 18.8108 0.53668 19.7033 1.08918 20.2558L9.00835 28.1749C9.56085 28.7274 10.4533 28.7274 11.0058 28.1749L18.925 20.2558C19.4633 19.7033 19.4633 18.7966 18.925 18.2441Z"
                            fill="#282C2F"/>
                    </svg>
                </button>
                <button class="test-button-next">
                    <svg width="20" height="29" viewBox="0 0 20 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M18.925 18.2441C18.3725 17.6916 17.48 17.6916 16.9275 18.2441L11.4167 23.7408V2.24992C11.4167 1.47075 10.7792 0.833252 10 0.833252C9.22085 0.833252 8.58335 1.47075 8.58335 2.24992V23.7549L3.08668 18.2583C2.53418 17.7058 1.64168 17.7058 1.08918 18.2583C0.53668 18.8108 0.53668 19.7033 1.08918 20.2558L9.00835 28.1749C9.56085 28.7274 10.4533 28.7274 11.0058 28.1749L18.925 20.2558C19.4633 19.7033 19.4633 18.7966 18.925 18.2441Z"
                            fill="#282C2F"/>
                    </svg>
                </button>
            </div>
            <button type="submit" style="color: white" class="test-button">
                Сдать тест
            </button>
        </div>
    </form>
</template>
<script>
import QuestionTest from "../test1/questions/QuestionTest";
import QuestionTest2 from "../test2/questions/QuestionTest2";
import QuestionTest3 from "../test2/questions/QuestionTest3";
import QuestionTest4 from "../test2/questions/QuestionTest4";
import QuestionTest5 from "../test2/questions/QuestionTest5";
import QuestionTest6 from "../test2/questions/QuestionTest6";
import QuestionTest7 from "../test2/questions/QuestionTest7";
import QuestionTest8 from "../test2/questions/QuestionTest8";
import QuestionTest9 from "../test2/questions/QuestionTest9";
import QuestionTest10 from "../test2/questions/QuestionTest10";
import QuestionTest11 from "../test2/questions/QuestionTest11";
import QuestionTest12 from "../test2/questions/QuestionTest12";
import QuestionTest13 from "../test2/questions/QuestionTest13";
import QuestionTest14 from "../test2/questions/QuestionTest14";
import QuestionTest15 from "../test2/questions/QuestionTest15";
import QuestionTest16 from "../test3/questions/QuestionV16";
import QuestionTest17 from "../test3/questions/QuestionV17";
import QuestionTest18 from "../test3/questions/QuestionV18";
import QuestionTest19 from "../test3/questions/QuestionV19";
import QuestionTest20 from "../test3/questions/QuestionV20";
import QuestionTest21 from "../test3/questions/QuestionV21";
import QuestionTest22 from "../test3/questions/QuestionV22";
import QuestionTest23 from "../test3/questions/QuestionV23";
import QuestionTest24 from "../test3/questions/QuestionV24";
import QuestionTest25 from "../test3/questions/QuestionV25";
import QuestionTest26 from "../test3/questions/QuestionV26";
import QuestionTest27 from "../test3/questions/QuestionV27";
import QuestionTest28 from "../test3/questions/QuestionV28";
import QuestionTest29 from "../test3/questions/QuestionV29";
import QuestionTest30 from "../test4/questions/QuestionV30";
import QuestionTest31 from "../test4/questions/QuestionV31";
import QuestionTest32 from "../test4/questions/QuestionV32";
import QuestionTest33 from "../test4/questions/QuestionV33";
import QuestionTest34 from "../test5/questions/QuestionV34";
import QuestionTest35 from "../test5/questions/QuestionV35";
import QuestionTest36 from "../test5/questions/QuestionV36";
import QuestionTest37 from "../test5/questions/QuestionV37";
import QuestionTest38 from "../test5/questions/QuestionV38";
import QuestionTest39 from "../test5/questions/QuestionV39";
import QuestionTest40 from "../test5/questions/QuestionV40";
import QuestionTest41 from "../test5/questions/QuestionV41";
import QuestionTest42 from "../test5/questions/QuestionV42";
import QuestionTest43 from "../test5/questions/QuestionV43";
import QuestionTest44 from "../test5/questions/QuestionV44";
import QuestionTest45 from "../test5/questions/QuestionV45";
import QuestionTest46 from "../test6/questions/QuestionV46";
import QuestionTest47 from "../test6/questions/QuestionV47";
import QuestionTest48 from "../test6/questions/QuestionV48";
import QuestionTest49 from "../test6/questions/QuestionV49";
import QuestionTest50 from "../test6/questions/QuestionV50";
import QuestionTest51 from "../test6/questions/QuestionV51";
import QuestionTest52 from "../test6/questions/QuestionV52";
import QuestionTest53 from "../test6/questions/QuestionV53";
import QuestionTest54 from "../test6/questions/QuestionV54";
import QuestionTest55 from "../test6/questions/QuestionV55";
import QuestionTest56 from "../test6/questions/QuestionV56";
import QuestionTest57 from "../test6/questions/QuestionV57";
import QuestionTest58 from "../test6/questions/QuestionV58";
import QuestionTest59 from "../test6/questions/QuestionV59";
import QuestionTest60 from "../test6/questions/QuestionV60";
import QuestionTest61 from "../test7/questions/QuestionV61";
import QuestionTest62 from "../test7/questions/QuestionV62";
import QuestionTest63 from "../test7/questions/QuestionV63";
import QuestionTest64 from "../test7/questions/QuestionV64";
import QuestionTest65 from "../test7/questions/QuestionV65";
import QuestionTest66 from "../test8/questions/QuestionV66";
import QuestionTest67 from "../test8/questions/QuestionV67";
import QuestionTest68 from "../test8/questions/QuestionV68";
import QuestionTest69 from "../test8/questions/QuestionV69";
import QuestionTest70 from "../test8/questions/QuestionV70";
import QuestionTest71 from "../test9/questions/QuestionV71";
import QuestionTest72 from "../test9/questions/QuestionV72";
import QuestionTest73 from "../test9/questions/QuestionV73";
import QuestionTest74 from "../test9/questions/QuestionV74";
import QuestionTest75 from "../test10/questions/QuestionV75";
import QuestionTest76 from "../test10/questions/QuestionV76";
import QuestionTest77 from "../test10/questions/QuestionV77";
import QuestionTest78 from "../test10/questions/QuestionV78";
import QuestionTest79 from "../test10/questions/QuestionV79";
import QuestionTest80 from "../test11/questions/QuestionV80";
import QuestionTest81 from "../test11/questions/QuestionV81";
import QuestionTest84 from "../test12/questions/QuestionV84";
import QuestionTest85 from "../test12/questions/QuestionV85";
import QuestionTest86 from "../test12/questions/QuestionV86";
import QuestionTest87 from "../test12/questions/QuestionV87";
import QuestionTest88 from "../test13/questions/QuestionV88";
import QuestionTest89 from "../test13/questions/QuestionV89";
import QuestionTest91 from "../test14/questions/QuestionV91";
import QuestionTest92 from "../test15/questions/QuestionV92";
import QuestionTest93 from "../test15/questions/QuestionV93";
import QuestionTest94 from "../test15/questions/QuestionV94";
import Timer from "../Timer";

export default {
    props: ["test", "questions", "chapter"],

    created() {
        this.startTest();
    },

    data() {
        return {
            attempt: {},
            loading: false,
            completed: false,
            answer_list: [],
            test_good: false,
            test_bad: false,
            correct_answers: "",
            // timer
            hours: 1,
            minutes: 30,
            seconds: 0,
            result: null
        };
    },

    methods: {
        startTest() {
            this.loading = true;
            this.completed = false;
            this.test_good = false;
            this.test_bad = false;
            this.answer_list = [];
            this.result = null;
            axios
                .post(`/start-test/${this.test.id}`)
                .then(resp => {
                    this.attempt = resp.data;

                    /*const finished_at = new Date(this.attempt.finished_at);
                    const now = new Date();

                    let diff = finished_at - new Date();

                    if (diff < 0) {
                        let timezone = now.getTimezoneOffset();
                        if (timezone < 0) {
                            timezone *= -1;
                        }

                        diff = diff + timezone * 60000;
                    }

                    this.setTime(diff);*/
                    this.setTimeInMinutes();
                    this.loading = false;
                })
                .catch(error => {
                    console.log(error);
                    this.loading = false;
                });
        },
        setTimeInMinutes() {
            let tempMin = this.test.minutes;
            let tempHour = 0;
            while (tempMin >= 60) {
                tempMin -= 60;
                tempHour++;
            }

            if (!isNaN(tempHour) && tempHour >= 0) {
                this.hours = tempHour;
            }

            if (!isNaN(tempMin) && tempMin >= 0) {
                this.minutes = tempMin;
            }
        },
        setTime(timeInMiliseconds) {
            const hours = Math.floor(timeInMiliseconds / 1000 / 60 / 60);

            const minutes = Math.floor(
                (timeInMiliseconds / 1000 / 60 / 60 - hours) * 60
            );
            const seconds = Math.floor(
                ((timeInMiliseconds / 1000 / 60 / 60 - hours) * 60 - minutes) *
                60
            );

            if (!isNaN(hours) && hours >= 0) {
                this.hours = hours;
            }

            if (!isNaN(minutes) && minutes >= 0) {
                this.minutes = minutes;
            }

            if (!isNaN(seconds) && seconds >= 0) {
                this.seconds = seconds;
            }
        },
        handlerAnswers(data) {
            const index = this.answer_list
                .map(item => item.question_index)
                .indexOf(data.question_index);

            if (index === -1) {
                return this.answer_list.push(data);
            }

            return (this.answer_list[index] = data);
        },
        submit() {
            this.loading = true;
            axios
                .post(`/validatate-test-result/${this.attempt.id}`, {
                    answer_list: this.answer_list
                })
                .then(resp => {
                    //window.location.href = `/test/result/${this.attempt.id}`;
                    this.loading = false;
                    this.completed = true;
                    this.correct_answers = resp.data.correct;
                    if (resp.data.is_passed) {
                        this.test_good = true;
                    } else {
                        this.test_bad = true;
                    }
                    this.result = JSON.parse(resp.data.answers);
                })
                .catch(error => {
                    this.loading = false;
                    console.log(error);
                });
        }
    },
    components: {
        QuestionTest,
        QuestionTest2,
        QuestionTest3,
        QuestionTest4,
        QuestionTest5,
        QuestionTest6,
        QuestionTest7,
        QuestionTest8,
        QuestionTest9,
        QuestionTest10,
        QuestionTest11,
        QuestionTest12,
        QuestionTest13,
        QuestionTest14,
        QuestionTest15,
        QuestionTest16,
        QuestionTest17,
        QuestionTest18,
        QuestionTest19,
        QuestionTest20,
        QuestionTest21,
        QuestionTest22,
        QuestionTest23,
        QuestionTest24,
        QuestionTest25,
        QuestionTest26,
        QuestionTest27,
        QuestionTest28,
        QuestionTest29,
        QuestionTest30,
        QuestionTest31,
        QuestionTest32,
        QuestionTest33,
        QuestionTest34,
        QuestionTest35,
        QuestionTest36,
        QuestionTest37,
        QuestionTest38,
        QuestionTest39,
        QuestionTest40,
        QuestionTest41,
        QuestionTest42,
        QuestionTest43,
        QuestionTest44,
        QuestionTest45,
        QuestionTest46,
        QuestionTest47,
        QuestionTest48,
        QuestionTest49,
        QuestionTest50,
        QuestionTest51,
        QuestionTest52,
        QuestionTest53,
        QuestionTest54,
        QuestionTest55,
        QuestionTest56,
        QuestionTest57,
        QuestionTest58,
        QuestionTest59,
        QuestionTest60,
        QuestionTest61,
        QuestionTest62,
        QuestionTest63,
        QuestionTest64,
        QuestionTest65,
        QuestionTest66,
        QuestionTest67,
        QuestionTest68,
        QuestionTest69,
        QuestionTest70,
        QuestionTest71,
        QuestionTest72,
        QuestionTest73,
        QuestionTest74,
        QuestionTest75,
        QuestionTest76,
        QuestionTest77,
        QuestionTest78,
        QuestionTest79,
        QuestionTest80,
        QuestionTest81,
        QuestionTest84,
        QuestionTest85,
        QuestionTest86,
        QuestionTest87,
        QuestionTest88,
        QuestionTest89,
        QuestionTest91,
        QuestionTest92,
        QuestionTest93,
        QuestionTest94,
        Timer
    }
};
</script>
