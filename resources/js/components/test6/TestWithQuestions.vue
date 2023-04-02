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
                    <question-test-46
                        number="46"
                        from="94"
                        v-on:answer="handlerAnswers"
                        :serverAnswers="result"
                        :questions="questions"
                        ordinalNumber="01"
                    ></question-test-46>
                </div>
                <div class="swiper-slide test-slide">
                    <question-test-47
                        number="47"
                        from="94"
                        v-on:answer="handlerAnswers"
                        :serverAnswers="result"
                        :questions="questions"
                        ordinalNumber="02"
                    ></question-test-47>
                </div>
                <div class="swiper-slide test-slide">
                    <question-test-48
                        number="48"
                        from="94"
                        v-on:answer="handlerAnswers"
                        :serverAnswers="result"
                        :questions="questions"
                        ordinalNumber="03"
                    ></question-test-48>
                </div>
                <div class="swiper-slide test-slide">
                    <question-test-49
                        number="49"
                        from="94"
                        v-on:answer="handlerAnswers"
                        :serverAnswers="result"
                        :questions="questions"
                        ordinalNumber="04"
                    ></question-test-49>
                </div>
                <div class="swiper-slide test-slide">
                    <question-test-50
                        number="50"
                        from="94"
                        v-on:answer="handlerAnswers"
                        :serverAnswers="result"
                        :questions="questions"
                        ordinalNumber="05"
                    ></question-test-50>
                </div>
                <div class="swiper-slide test-slide">
                    <question-test-51
                        number="51"
                        from="94"
                        v-on:answer="handlerAnswers"
                        :serverAnswers="result"
                        :questions="questions"
                        ordinalNumber="06"
                    ></question-test-51>
                </div>
                <div class="swiper-slide test-slide">
                    <question-test-52
                        number="52"
                        from="94"
                        v-on:answer="handlerAnswers"
                        :serverAnswers="result"
                        :questions="questions"
                        ordinalNumber="07"
                    ></question-test-52>
                </div>
                <div class="swiper-slide test-slide">
                    <question-test-53
                        number="53"
                        from="94"
                        v-on:answer="handlerAnswers"
                        :serverAnswers="result"
                        :questions="questions"
                        ordinalNumber="08"
                    ></question-test-53>
                </div>
                <div class="swiper-slide test-slide">
                    <question-test-54
                        number="54"
                        from="94"
                        v-on:answer="handlerAnswers"
                        :serverAnswers="result"
                        :questions="questions"
                        ordinalNumber="09"
                    ></question-test-54>
                </div>
                <div class="swiper-slide test-slide">
                    <question-test-55
                        number="55"
                        from="94"
                        v-on:answer="handlerAnswers"
                        :serverAnswers="result"
                        :questions="questions"
                        ordinalNumber="10"
                    ></question-test-55>
                </div>
                <div class="swiper-slide test-slide">
                    <question-test-56
                        number="56"
                        from="94"
                        v-on:answer="handlerAnswers"
                        :serverAnswers="result"
                        :questions="questions"
                        ordinalNumber="11"
                    ></question-test-56>
                </div>
                <div class="swiper-slide test-slide">
                    <question-test-57
                        number="57"
                        from="94"
                        v-on:answer="handlerAnswers"
                        :serverAnswers="result"
                        :questions="questions"
                        ordinalNumber="12"
                    ></question-test-57>
                </div>
                <div class="swiper-slide test-slide">
                    <question-test-58
                        number="58"
                        from="94"
                        v-on:answer="handlerAnswers"
                        :serverAnswers="result"
                        :questions="questions"
                        ordinalNumber="13"
                    ></question-test-58>
                </div>
                <div class="swiper-slide test-slide">
                    <question-test-59
                        number="59"
                        from="94"
                        v-on:answer="handlerAnswers"
                        :serverAnswers="result"
                        :questions="questions"
                        ordinalNumber="14"
                    ></question-test-59>
                </div>
                <div class="swiper-slide test-slide">
                    <question-test-60
                        number="60"
                        from="94"
                        v-on:answer="handlerAnswers"
                        :serverAnswers="result"
                        :questions="questions"
                        ordinalNumber="15"
                    ></question-test-60>
                </div>
            </div>
        </div>
        <div v-show="!loading && !completed" class="test-button__blok test-button__blok_space-between">
            <div class="swiper-navigation">
                <button class="test-button-prev">
                    <svg width="20" height="29" viewBox="0 0 20 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M18.925 18.2441C18.3725 17.6916 17.48 17.6916 16.9275 18.2441L11.4167 23.7408V2.24992C11.4167 1.47075 10.7792 0.833252 10 0.833252C9.22085 0.833252 8.58335 1.47075 8.58335 2.24992V23.7549L3.08668 18.2583C2.53418 17.7058 1.64168 17.7058 1.08918 18.2583C0.53668 18.8108 0.53668 19.7033 1.08918 20.2558L9.00835 28.1749C9.56085 28.7274 10.4533 28.7274 11.0058 28.1749L18.925 20.2558C19.4633 19.7033 19.4633 18.7966 18.925 18.2441Z" fill="#282C2F"/>
                    </svg>
                </button>
                <button class="test-button-next">
                    <svg width="20" height="29" viewBox="0 0 20 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M18.925 18.2441C18.3725 17.6916 17.48 17.6916 16.9275 18.2441L11.4167 23.7408V2.24992C11.4167 1.47075 10.7792 0.833252 10 0.833252C9.22085 0.833252 8.58335 1.47075 8.58335 2.24992V23.7549L3.08668 18.2583C2.53418 17.7058 1.64168 17.7058 1.08918 18.2583C0.53668 18.8108 0.53668 19.7033 1.08918 20.2558L9.00835 28.1749C9.56085 28.7274 10.4533 28.7274 11.0058 28.1749L18.925 20.2558C19.4633 19.7033 19.4633 18.7966 18.925 18.2441Z" fill="#282C2F"/>
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
import QuestionTest46 from "./questions/QuestionV46";
import QuestionTest47 from "./questions/QuestionV47";
import QuestionTest48 from "./questions/QuestionV48";
import QuestionTest49 from "./questions/QuestionV49";
import QuestionTest50 from "./questions/QuestionV50";
import QuestionTest51 from "./questions/QuestionV51";
import QuestionTest52 from "./questions/QuestionV52";
import QuestionTest53 from "./questions/QuestionV53";
import QuestionTest54 from "./questions/QuestionV54";
import QuestionTest55 from "./questions/QuestionV55";
import QuestionTest56 from "./questions/QuestionV56";
import QuestionTest57 from "./questions/QuestionV57";
import QuestionTest58 from "./questions/QuestionV58";
import QuestionTest59 from "./questions/QuestionV59";
import QuestionTest60 from "./questions/QuestionV60";
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
        Timer
    }
};
</script>
