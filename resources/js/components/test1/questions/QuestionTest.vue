<template>
    <div class="test-block">
        <div class="test-number number">
            {{ ordinalNumber }} <b>/ {{ questions }}</b>
        </div>
        <div class="test-main test-nervous-system">
            <div class="test-caption">
                <p>
                    Схема строения нервной системы
                    <span>
                    Напишите рядом с каждой стрелкой соответствующие названия.
                </span>
                </p>
                <div class="test-number number" style="width: 100%;">
                    <b>Карточка книги <span style="font-weight: 700; display: inline;">№{{ number }}</span></b>
                </div>
            </div>
            <div class="test-compliance">
                <div class="compliance-img">
                    <img
                        :src="currentUrl + '/test-img/test1.png'"
                        alt="courses"
                        class="compliance-img__img"
                    />
                    <img
                        :src="currentUrl + '/test-img/test1-mob.png'"
                        alt="courses"
                        class="compliance-img-mobile"
                    />
                </div>
                <ul class="compliance-list">
                    <li :key="index" v-for="(item, index) in answers">
                        <p class="test-txt">{{ item.symbol }})</p>
                        <input
                            type="text"
                            v-bind:class="{
                                correct:
                                    correct(item.result, item.correct) == 1,
                                incorrect:
                                    correct(item.result, item.correct) == 0
                            }"
                            class="test-input compliance-input"
                            :readonly="serverAnswers"
                            v-model="answers[index].result"
                        />
                    </li>
                </ul>
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
            currentUrl: "",
            answers: [
                {
                    symbol: "А",
                    result: null,
                    correct: "кора"
                },
                {
                    symbol: "Б",
                    result: null,
                    correct: "подкорковые узлы"
                },
                {
                    symbol: "В",
                    result: null,
                    correct: "внутренняя капсула"
                },
                {
                    symbol: "Г",
                    result: null,
                    correct: "ножки мозга"
                },
                {
                    symbol: "Д",
                    result: null,
                    correct: "варолиев мост"
                },
                {
                    symbol: "Е",
                    result: null,
                    correct: "мозжечок"
                },
                {
                    symbol: "Ж",
                    result: null,
                    correct: "продолговатый мозг"
                },
                {
                    symbol: "З",
                    result: null,
                    correct: "корешки"
                },
                {
                    symbol: "И",
                    result: null,
                    correct: "шейное"
                },
                {
                    symbol: "К",
                    result: null,
                    correct: "корешки"
                },
                {
                    symbol: "Л",
                    result: null,
                    correct: "поясничное утолщение"
                },
                {
                    symbol: "М",
                    result: null,
                    correct: "конус"
                },
                {
                    symbol: "Н",
                    result: null,
                    correct: "конский хвост"
                }
            ]
        };
    },
    watch: {
        answers: {
            handler: function (newVal, oldVal) {
                this.$emit("answer", {
                    question_index: 1,
                    answer: this.answers
                });
            },
            deep: true
        }
    },
    methods: {
        insensitiveSearch(str1, str2) {
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
    },
    computed: {
        currentQuestionAnswers() {
            if (!this.serverAnswers) {
                return null;
            }

            return this.serverAnswers.find(x => x.question_index == "1");
        }
    }
};
</script>
