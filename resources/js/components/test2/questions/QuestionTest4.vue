<template>
    <div class="test-block">
        <div class="test-number number">
            {{ordinalNumber}} <b>/   {{ questions }}</b>
        </div>
        <div class="test-main test-peripheral-nerves-as-part-of-reflex-arcs">
            <div class="test-caption">
                <p>
                    Периферические нервы в составе рефлекторных дуг
                    <span>
                    Укажите какие нервы соответсвуют рефлексам
                </span>
                </p>
                <div class="test-number number" style="width: 100%;">
                    <b>Карточка книги <span style="font-weight: 700; display: inline;">№{{ number }}</span></b>
                </div>
            </div>
            <ul class="test-compliance">
                <li :key="index" v-for="(item, index) in answers">
                    <div class="row">
                        <div class="col-md-4 col-lg-5">
                            <p class="test-txt ">
                                <span>{{ item.symbol }})</span>
                                {{ item.description }}
                            </p>
                        </div>
                        <div class="col-md-8 col-lg-7">
                            <input
                                type="text"
                                class="test-input compliance-input"
                                v-model="answers[index].result"
                                v-bind:class="{
                                    correct:
                                        correct(item.result, item.correct) == 1,
                                    incorrect:
                                        correct(item.result, item.correct) == 0
                                }"
                                :readonly="serverAnswers"
                            />
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</template>
<script>
export default {
    created() {
        // вывести ответы пользователя, если попытка завершена
        if (this.currentQuestionAnswers) {
            this.answers = this.currentQuestionAnswers.answer;
        }
    },
    props: {
        ordinalNumber: {
            type: String,
            default: "01"
        },
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
    },
    data() {
        return {
            answers: [
                {
                    symbol: "А",
                    result: null,
                    description: " Корнеальный (как и супраорбитальный)",
                    correct: "тройничный и лицевой"
                },
                {
                    symbol: "Б",
                    result: null,
                    description: "Бицепс-рефлекс",
                    correct: "мышечно-кожный"
                },
                {
                    symbol: "В",
                    result: null,
                    description: "Трицепс-рефлекс",
                    correct: "лучевой (radialis)"
                },
                {
                    symbol: "Г",
                    result: null,
                    description: "Брюшные",
                    correct: "межреберные"
                },
                {
                    symbol: "Д",
                    result: null,
                    description: "Коленный",
                    correct: "бедренный"
                },
                {
                    symbol: "Е",
                    result: null,
                    description: "Ахиллов",
                    correct: "седалищный"
                },
                {
                    symbol: "Ж",
                    result: null,
                    description: "Подошвенный",
                    correct: "седалищный"
                }
            ]
        };
    },
    watch: {
        answers: {
            handler: function(newVal, oldVal) {
                this.$emit("answer", {
                    question_index: 4,
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

            return this.serverAnswers.find(x => x.question_index == "4");
        }
    }
};
</script>
