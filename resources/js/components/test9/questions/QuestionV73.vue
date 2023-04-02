<template>
    <div class="test-block">
        <div class="test-number number">
            {{ordinalNumber}} <b>/   {{ questions }}</b>
        </div>
        <div class="test-main test-main-73 test-exercise-in-topical-diagnostic">
            <div class="test-caption">
                <p>
                    Упражнение в топической диагностике
                </p>
                <div class="test-number number" style="width: 100%;">
                    <b>Карточка книги <span style="font-weight: 700; display: inline;">№{{ number }}</span></b>
                </div>
            </div>
            <div class="test-compliance">
                <div class="test-explanation test-explanation-mob">
                    <p class="explanation-txt">
                        <b>Дано:</b><br />
                        На схеме указаны три патологических очага, которые
                        привели к поражению лицевого нерва:<br />
                        <b>1. В стволе лицевого нерва слева.</b><br />
                        <b>2. В левой половине моста.</b><br />
                        <b>3. Во внутренней сумке справа.</b><br />
                    </p>
                </div>
                <div class="swipe-block">
                    <div class="row">
                        <div class="col-sm-2 col-3">
                            <img
                                :src="currentUrl + '/test-img/arm1.png'"
                                alt="courses"
                            />
                            <img
                                :src="currentUrl + '/test-img/arm2.png'"
                                alt="courses"
                            />
                        </div>
                        <div class="col-sm-10 col-9">
                            <p>
                                Перемешайте картинку вверх-вниз, влево-впарво и
                                увеличивайтечто бы увидеть ее целиком
                            </p>
                        </div>
                    </div>
                </div>
                <div class="compliance-img">
                    <img
                        :src="currentUrl + '/test-img/test63.png'"
                        alt="courses"
                    />
                </div>
                <div class="compliance-block">
                    <div class="test-explanation test-explanation-desc">
                        <p class="explanation-txt">
                            <b>Дано:</b><br />
                            На схеме указаны три патологических очага, которые
                            привели к поражению лицевого нерва:<br />
                            <b>1. В стволе лицевого нерва слева.</b><br />
                            <b>2. В левой половине моста.</b><br />
                            <b>3. Во внутренней сумке справа.</b><br />
                        </p>
                    </div>
                    <div class="test-explanation">
                        <p class="explanation-txt">
                            <b class="last"
                                >Поставьте под каждой фигурой с изображением
                                развившейся патологии соответствующий номер.</b
                            ><br />
                        </p>
                    </div>
                    <ul class="compliance-list row">
                        <li
                            v-for="(item, index) in answers"
                            class="col-md-4 col-6 compliance__item-input"
                            :key="index"
                        >
                            <div>
                                <p class="test-txt">{{ item.symbol }})</p>
                                <input
                                    type="text"
                                    class="test-input compliance-input small-inputs"
                                    v-model="answers[index].result"
                                    v-bind:class="{
                                        correct:
                                            correct(
                                                answers[index].result,
                                                answers[index].correct
                                            ) == 1,
                                        incorrect:
                                            correct(
                                                answers[index].result,
                                                answers[index].correct
                                            ) == 0
                                    }"
                                    :readonly="serverAnswers"
                                />
                            </div>
                            <div>
                                <img
                                    class="compliance-img-answer"
                                    :src="currentUrl + '/' + item.img"
                                    alt="courses"
                                />
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props: {
        number: {
            type: String,
            default: "01"
        },
        from: {
            type: String,
            default: "01"
        },
        serverAnswers: {
            type: Array
        },
      questions: {
            type: Number,
        },
        ordinalNumber: {
            type: String,
            default: "01"
        },
    },
    created() {
        this.currentUrl = window.location.origin;
        // вывести ответы пользователя, если попытка завершена
        if (this.currentQuestionAnswers) {
            this.answers = this.currentQuestionAnswers.answer;
        }
    },
    data() {
        return {
            answers: [
                {
                    correct: "3",
                    symbol: "А",
                    result: null,
                    img: "test-img/test63(1).png"
                },
                {
                    correct: "2",
                    symbol: "Б",
                    result: null,
                    img: "test-img/test63(2).png"
                },
                {
                    correct: "1",
                    symbol: "В",
                    result: null,
                    img: "test-img/test63(3).png"
                }
            ]
        };
    },
    watch: {
        answers: {
            handler: function(newVal, oldVal) {
                this.$emit("answer", {
                    question_index: 73,
                    answer: this.answers
                });
            },
            deep: true
        }
    },
    computed: {
        currentQuestionAnswers() {
            if (!this.serverAnswers) {
                return null;
            }

            return this.serverAnswers.find(x => x.question_index == "73");
        }
    },
    methods: {
        insensitiveSearch(str1, str2) {
            if (!str1 || !str2) {
                return false;
            }

            str1 = str1.replace("(", "");
            str1 = str1.replace(")", "");
            str2 = str2.replace("(", "");
            str2 = str2.replace(")", "");

            let search_str = new RegExp(str2, "ig");

            if (!str1) return false;

            var result = str1.search(search_str);
            return result != -1;
        },
        correct(answer, correct) {
            if (!this.serverAnswers) {
                return null;
            }

            if (this.insensitiveSearch(answer, correct)) {
                return 1;
            }

            return 0;
        }
    }
};
</script>
