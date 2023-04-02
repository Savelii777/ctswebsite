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
        <div v-if="!loading" id="test">
            <question-test-91
                number="91"
                from="94"
                v-on:answer="handlerAnswers"
                :serverAnswers="result"
                :questions="questions"
                ordinalNumber="01"
            ></question-test-91>
        </div>
        <div v-if="!loading && !completed" class="test-button__blok">
            <button type="submit" style="color: white" class="test-button">
                Сдать тест
            </button>
        </div>
    </form>
</template>
<script>
import QuestionTest91 from "./questions/QuestionV91";
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
        QuestionTest91,
        Timer
    }
};
</script>
