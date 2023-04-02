<template>
    <div class="test-block">
        <div class="test-number number">
            {{ ordinalNumber }} <b>/   {{ questions }}</b>
        </div>
        <div class="test-main test-main-81 test-exercise-in-topical-diagnostic">
            <div class="test-caption">
                <p>
                    Экстрапирамидная система
                    <span>
                    Рассмотрите схемы на стр. 222 и опишите ход каждого из путей
                    мозжечка по номерам, указанным на схемах.
                </span>
                </p>
                <div class="test-number number" style="width: 100%;">
                    <b>Карточка книги <span style="font-weight: 700; display: inline;">№{{ number }}</span></b>
                </div>
            </div>
            <div class="test-compliance">
                <div class="row block-81 block-81-white">
                    <div class="col-2 block-title">
                        <p class="title">
                            Tractus spino- cerebellaris dorsalis (Флексига)
                        </p>
                    </div>
                    <ul class="col-10 block-answers">
                        <li v-for="(item, index) in firstPart" :key="index">
                            <p class="compliance-txt">{{ item.symbol }}.</p>
                            <input
                                type="text"
                                class="test-input compliance-input"
                                v-model="firstPart[index].result"
                                v-bind:class="{
                                    correct:
                                        correct(
                                            firstPart[index].result,
                                            firstPart[index].correct
                                        ) == 1,
                                    incorrect:
                                        correct(
                                            firstPart[index].result,
                                            firstPart[index].correct
                                        ) == 0
                                }"
                                :readonly="serverAnswers"
                            />
                        </li>
                    </ul>
                </div>
                <div class="row block-81 block-81-gray">
                    <div class="col-2 block-title">
                        <p class="title">
                            Tractus spinocerebellaris ventralis (Говерса)
                        </p>
                    </div>
                    <ul class="col-10 block-answers">
                        <li v-for="(item, index) in secondPart" :key="index">
                            <p class="compliance-txt">{{ item.symbol }}.</p>
                            <input
                                type="text"
                                class="test-input compliance-input"
                                v-model="secondPart[index].result"
                                v-bind:class="{
                                    correct:
                                        correct(
                                            secondPart[index].result,
                                            secondPart[index].correct
                                        ) == 1,
                                    incorrect:
                                        correct(
                                            secondPart[index].result,
                                            secondPart[index].correct
                                        ) == 0
                                }"
                                :readonly="serverAnswers"
                            />
                        </li>
                    </ul>
                </div>
                <div class="row block-81 block-81-white">
                    <div class="col-2 block-title">
                        <p class="title">
                            Заднестолбовой путь к мозжечку
                        </p>
                    </div>
                    <ul class="col-10 block-answers">
                        <li v-for="(item, index) in thirdPart" :key="index">
                            <p class="compliance-txt">{{ item.symbol }}.</p>
                            <input
                                type="text"
                                class="test-input compliance-input"
                                v-model="thirdPart[index].result"
                                v-bind:class="{
                                    correct:
                                        correct(
                                            thirdPart[index].result,
                                            thirdPart[index].correct
                                        ) == 1,
                                    incorrect:
                                        correct(
                                            thirdPart[index].result,
                                            thirdPart[index].correct
                                        ) == 0
                                }"
                                :readonly="serverAnswers"
                            />
                        </li>
                    </ul>
                </div>
                <div class="row block-81 block-81-gray">
                    <div class="col-2 block-title">
                        <p class="title">
                            Tractus frontoponto-cerebellaris (et tr.
                            temporoponto-cerebellaris)
                        </p>
                    </div>
                    <ul class="col-10 block-answers">
                        <li v-for="(item, index) in fourthPart" :key="index">
                            <p class="compliance-txt">{{ item.symbol }}.</p>
                            <input
                                type="text"
                                class="test-input compliance-input"
                                v-model="fourthPart[index].result"
                                v-bind:class="{
                                    correct:
                                        correct(
                                            fourthPart[index].result,
                                            fourthPart[index].correct
                                        ) == 1,
                                    incorrect:
                                        correct(
                                            fourthPart[index].result,
                                            fourthPart[index].correct
                                        ) == 0
                                }"
                                :readonly="serverAnswers"
                            />
                        </li>
                    </ul>
                </div>
                <div class="row block-81 block-81-white">
                    <div class="col-2 block-title">
                        <p class="title">
                            Tractuscerebello rubrospinalis
                        </p>
                    </div>
                    <ul class="col-10 block-answers">
                        <li v-for="(item, index) in fifthPart" :key="index">
                            <p class="compliance-txt">{{ item.symbol }}.</p>
                            <input
                                type="text"
                                class="test-input compliance-input"
                                v-model="fifthPart[index].result"
                                v-bind:class="{
                                    correct:
                                        correct(
                                            fifthPart[index].result,
                                            fifthPart[index].correct
                                        ) == 1,
                                    incorrect:
                                        correct(
                                            fifthPart[index].result,
                                            fifthPart[index].correct
                                        ) == 0
                                }"
                                :readonly="serverAnswers"
                            />
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
        // вывести ответы пользователя, если попытка завершена
        if (this.currentQuestionAnswers) {
            this.answers = this.currentQuestionAnswers.answer;
        }
    },
    data() {
        return {
            answers: [
                {
                    correct: "Клетки заднего рога",
                    part: 0,
                    symbol: "1",
                    result: null
                },
                {
                    correct: "Боковой столб (дорсолатеральные отделы)",
                    part: 0,
                    symbol: "2",
                    result: null
                },
                {
                    correct: "Продолговатый мозг",
                    part: 0,
                    symbol: "3",
                    result: null
                },
                {
                    correct: "Нижняя ножка мозжечка",
                    part: 0,
                    symbol: "4",
                    result: null
                },
                {
                    correct: "К ядрам червя мозжечка",
                    part: 0,
                    symbol: "5",
                    result: null
                },
                {
                    correct: "Клетки заднего рога",
                    part: 1,
                    symbol: "1",
                    result: null
                },
                {
                    correct: "Перекрест",
                    part: 1,
                    symbol: "2",
                    result: null
                },
                {
                    correct: "Боковой столб (вентролатеральные отделы)",
                    part: 1,
                    symbol: "3",
                    result: null
                },
                {
                    correct: "Продолговатый мозг",
                    part: 1,
                    symbol: "4",
                    result: null
                },
                {
                    correct: "Варолиев мост",
                    part: 1,
                    symbol: "5",
                    result: null
                },
                {
                    correct: "Ножка мозга",
                    part: 1,
                    symbol: "6",
                    result: null
                },
                {
                    correct: "Перекрест",
                    part: 1,
                    symbol: "7",
                    result: null
                },
                {
                    correct: "Верхняя ножка мозжечка",
                    part: 1,
                    symbol: "8",
                    result: null
                },
                {
                    correct: "К ядрам червя мозжечка",
                    part: 1,
                    symbol: "9",
                    result: null
                },
                {
                    correct: "Спинальный ганглий",
                    part: 2,
                    symbol: "1",
                    result: null
                },
                {
                    correct: "Задние столбы",
                    part: 2,
                    symbol: "2",
                    result: null
                },
                {
                    correct: "Ядро Бурдаха в продолговатом мозге",
                    part: 2,
                    symbol: "3",
                    result: null
                },
                {
                    correct: "Перекрест",
                    part: 2,
                    symbol: "4",
                    result: null
                },
                {
                    correct: "Нижняя ножка мозжечка",
                    part: 2,
                    symbol: "5",
                    result: null
                },
                {
                    correct: "К ядрам червя мозжечка",
                    part: 2,
                    symbol: "6",
                    result: null
                },
                {
                    correct: "Клетки коры лобной (или височной) доли",
                    part: 3,
                    symbol: "1",
                    result: null
                },
                {
                    correct: "Capsula interna",
                    part: 3,
                    symbol: "2",
                    result: null
                },
                {
                    correct: "Ножка мозга",
                    part: 3,
                    symbol: "3",
                    result: null
                },
                {
                    correct: "Ядра Варолиева моста",
                    part: 3,
                    symbol: "4",
                    result: null
                },
                {
                    correct: "Перекрест",
                    part: 3,
                    symbol: "5",
                    result: null
                },
                {
                    correct: "Средняя ножка мозжечка",
                    part: 3,
                    symbol: "6",
                    result: null
                },
                {
                    correct: "В кору мозжечка",
                    part: 3,
                    symbol: "7",
                    result: null
                },
                {
                    correct: "Зубчатое ядро (nucl. dentatus)",
                    part: 4,
                    symbol: "1",
                    result: null
                },
                {
                    correct: "Верхняя ножка мозжечка",
                    part: 4,
                    symbol: "2",
                    result: null
                },
                {
                    correct: "Перекрест",
                    part: 4,
                    symbol: "3",
                    result: null
                },
                {
                    correct: "Красное ядро (nucl.ruber)",
                    part: 4,
                    symbol: "4",
                    result: null
                },
                {
                    correct: "Перекрест Фореля",
                    part: 4,
                    symbol: "5",
                    result: null
                },
                {
                    correct:
                        "Tractus rubro-spinalis в боковых столбах спинного мозга",
                    part: 4,
                    symbol: "6",
                    result: null
                },
                {
                    correct: "К клеткам переднего рога",
                    part: 4,
                    symbol: "7",
                    result: null
                }
            ]
        };
    },
    computed: {
        firstPart() {
            return this.answers.filter(item => item.part === 0);
        },
        secondPart() {
            return this.answers.filter(item => item.part === 1);
        },
        thirdPart() {
            return this.answers.filter(item => item.part === 2);
        },
        fourthPart() {
            return this.answers.filter(item => item.part === 3);
        },
        fifthPart() {
            return this.answers.filter(item => item.part === 4);
        },
        currentQuestionAnswers() {
            if (!this.serverAnswers) {
                return null;
            }

            return this.serverAnswers.find(x => x.question_index == "84");
        }
    },
    watch: {
        answers: {
            handler: function(newVal, oldVal) {
                this.$emit("answer", {
                    question_index: 84,
                    answer: this.answers
                });
            },
            deep: true
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
