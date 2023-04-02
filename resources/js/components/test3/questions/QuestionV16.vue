<template>
    <div class="test-block">
        <div class="test-number number">
            {{ ordinalNumber }} <b>/ {{ questions }}</b>
        </div>
        <div
            class="test-main test-exercise-in-topical-diagnostics-preparatory test-exercise-in-topical-diagnostics-preparatory-drag test-drag"
        >
            <div class="test-caption">
                <p>
                    Кортико-мускулярный путь
                    <span>
                    Впишите в схему двухнейронный кортико-мускулярный путь.
                </span>
                </p>
                <div class="test-number number" style="width: 100%;">
                    <b>Карточка книги <span style="font-weight: 700; display: inline;">№{{ number }}</span></b>
                </div>
            </div>
            <div class="test-compliance">
                <div class="test-explanation test-explanation-mob">
                    <p class="explanation-prg">
                        Расставьте цифры на картинке в нужном порядке и
                        подпишите соответвующие названия.
                    </p>
                    <p class="explanation-txt">
                        Зажмите левую кнопку мыши на нужной цифре и
                        перетаскивайте на картинку.
                    </p>
                </div>
                <div class="compliance-img">
                    <img
                        :src="currentUrl + '/test-img/test6.png'"
                        alt="courses"
                    />
                    <div class="squares-list squares-list8">
                        <drop
                            v-for="(group, index) in answers"
                            class="drop squares-item"
                            :key="index"
                            @dragover="handleDragover(group, ...arguments)"
                            @drop="handleDrop(index)"
                            :style="{ 'border-color': color }"
                            style="
                            border-width: 1px;
                            border-style: solid;
                            border-radius: 15%;"
                        >
                            <div class="squares-item__btn" v-if="group">
                                <span>{{ group }}</span>
                            </div>
                        </drop>
                    </div>
                </div>
                <div style="margin-left: 20%;" class="compliance-block">
                    <div class="test-explanation test-explanation-desc">
                        <p class="explanation-prg">
                            Расставьте цифры на картинке в нужном порядке и
                            подпишите соответвующие названия.
                        </p>
                        <p class="explanation-txt">
                            Зажмите левую кнопку мыши на нужной цифре и
                            перетаскивайте на картинку.
                        </p>
                    </div>
                    <p class="compliance-txt">
                        А) Центральный мотонейрон – пирамидный путь
                        (перекрещенный пучок)
                    </p>
                    <div class="compliance-elem-add">
                        <div
                            class="compliance-elem-add__item"
                            :key="index"
                            v-for="(item, index) in groups"
                        >
                            <drag class="drappable-elm">
                                <p class="test-txt">{{ index + 1 }}.</p>
                                <input
                                    type="text"
                                    v-model="groups[index]"
                                    class="test-input compliance-input"
                                    v-bind:class="{
                                        correct:
                                            correct(
                                                item,
                                                correctAnswers[index]
                                            ) == 1,
                                        incorrect:
                                            correct(
                                                item,
                                                correctAnswers[index]
                                            ) == 0
                                    }"
                                    :readonly="serverAnswers"
                                />
                            </drag>
                            <div class="squares-item__btn drappable">
                                <drag
                                    class="drag"
                                    :key="index"
                                    :transfer-data="{ item, example: 'groups' }"
                                    @dragstart="dragging = item, color = 'red'"
                                    @dragend="dragging = null, color = 'transparent'"
                                >
                                    <span class="squares-list__span">{{
                                            index + 1
                                        }}</span>
                                    <button
                                        class="compliance-btn-remove"
                                        @click.prevent="removeGroups(index)"
                                    >
                                        x
                                    </button>
                                </drag>
                            </div>
                        </div>
                        <button
                            class="compliance-btn-add"
                            @click.prevent="add()"
                        >
                            Добавить
                        </button>
                    </div>
                    <p class="compliance-txt">
                        Б) Периферический мотонейрон
                    </p>
                    <div class="compliance-elem-add">
                        <div
                            class="compliance-elem-add__item"
                            :key="index"
                            v-for="(item, index) in second"
                        >
                            <div class="drappable-elm">
                                <p class="test-txt">{{ index + 1 }}.</p>
                                <input
                                    type="text"
                                    v-model="item.result"
                                    class="test-input compliance-input"
                                    v-bind:class="{
                                        correct:
                                            correct(
                                                item.result,
                                                secondCorrect[index].result
                                            ) == 1,
                                        incorrect:
                                            correct(
                                                item.result,
                                                secondCorrect[index].result
                                            ) == 0
                                    }"
                                    :readonly="serverAnswers"
                                />
                            </div>
                            <div class="squares-item__btn drappable">
                                <div class="drag" :key="index">
                                    <button
                                        class="compliance-btn-remove"
                                        @click.prevent="removeSecond(index)"
                                    >
                                        x
                                    </button>
                                </div>
                            </div>
                        </div>
                        <button
                            class="compliance-btn-add"
                            @click.prevent="addSecond"
                        >
                            Добавить
                        </button>
                    </div>
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
            //this.groups = this.currentQuestionAnswers.answer;
            for (let i = 0; i < 9; i++) {
                if (this.currentQuestionAnswers.answer[i]) {
                    this.groups[i] = this.currentQuestionAnswers.answer[
                        i
                        ].result;
                }
            }

            if (this.groups.length < 9) {
                const additional = 9 - this.groups.length;

                for (let index = 0; index < additional; index++) {
                    this.add();
                }
            }

            this.second = [];

            let helperIndex = 0;
            for (let j = 9; j < 12; j++) {
                if (this.currentQuestionAnswers.answer[j]) {
                    this.second[helperIndex] = {
                        result: this.currentQuestionAnswers.answer[j].result
                    };
                }

                helperIndex++;
            }

            if (this.second.length < 3) {
                const additional = 3 - this.second.length;

                for (let index = 0; index < additional; index++) {
                    this.second.push({
                        result: ""
                    });
                }
            }
        }
    },
    data() {
        return {
            answers: [],
            groups: [""],
            second: [
                {
                    result: ""
                }
            ],
            color: 'transparent',
            secondCorrect: [
                {
                    result: "Клетка переднего рога"
                },
                {
                    result: "Передний корешок"
                },
                {
                    result: "Периферический нерв"
                }
            ],
            dragging: null,
            correctAnswers: [
                "Клетки Беца в передней центральной извилине",
                "Лучистый венец",
                "Внутренняя капсула",
                "Ножка мозга",
                "Варолиев мост",
                "Продолговатый мозг",
                "Перекрест пирамидных путей",
                "Боковой столб спинного мозга",
                "Передний рог спинного мозга"
            ]
        };
    },

    mounted() {
        for (let i = 0; i < 9; i++) this.answers.push("");
    },
    watch: {
        groups: {
            handler: function (newVal, oldVal) {
                let resultAnswers = [];

                this.groups.forEach((element, index) => {
                    if (element === "") {
                        return;
                    }

                    resultAnswers.push({result: this.groups[index]});
                });
                //console.log([...resultAnswers, ...this.second]);
                this.$emit("answer", {
                    question_index: 16,
                    answer: [...resultAnswers, ...this.second]
                });
            },
            deep: true
        },
        second: {
            handler: function (newVal, oldVal) {
                let resultAnswers = [];

                this.groups.forEach((element, index) => {
                    if (element === "") {
                        return;
                    }

                    resultAnswers.push({result: this.groups[index]});
                });

                //console.log([...resultAnswers, ...this.second]);
                this.$emit("answer", {
                    question_index: 16,
                    answer: [...resultAnswers, ...this.second]
                });
            },
            deep: true
        },
        answers: {
            handler: function (newVal, oldVal) {
                /*let resultAnswers = [];

                this.groups.forEach((element, index) => {
                    if (element === "") {
                        return;
                    }

                    resultAnswers.push({ result: this.groups[index] });
                });
                this.$emit("answer", {
                    question_index: 16,
                    answer: [...resultAnswers, ...this.second]
                });*/
            },
            deep: true
        }
    },
    methods: {
        add() {
            this.groups.push("");
        },
        addSecond() {
            this.second.push({
                result: ""
            });
        },
        handleDragover(group, data, event) {
            //console.log("success", group, data);
            /*	if (group !== data.group) {
					event.dataTransfer.dropEffect = 'none';
				}

            */
        },
        removeGroups(index) {
            let localIndex = null;

            if (this.groups.length === 1) {
                return;
            }

            for (let i = 0; i < this.answers.length; i++) {
                //console.log("index=>", this.answers[i], index);

                if (this.answers[i] == index + 1) {
                    this.answers[i] = "";
                }
            }

            this.groups.splice(index, 1);
        },
        removeSecond(index) {
            if (this.second.length === 1) {
                return (this.second[0].result = "");
            }

            this.second.splice(index, 1);
        },
        handleDrop(localIndex) {
            let index = null;

            for (let i = 0; i < this.groups.length; i++) {
                //console.log(this.groups[i]);
                if (this.groups[i] == this.dragging) {
                    index = i;
                    break;
                }
            }

            this.answers[localIndex] = index + 1;

            this.$nextTick(function () {
                this.add();
                var i = 0;
                while (i < this.groups.length) {
                    if (this.groups[i] == "") {
                        this.groups.splice(i, 1);
                    } else {
                        ++i;
                    }
                }
            });

            /*this.$emit("answer", {
                question_index: 16,
                answer: this.answers
            });*/
            // this.answers[index] = tmp.item///data.item

            ///console.log(`You dropped with data: ${JSON.stringify(data)}`);
        },
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

            return this.serverAnswers.find(x => x.question_index == "16");
        }
    }
};
</script>

<style>
.drag,
.drop {
    display: inline-block;
}

.drop.allowed {
    background-color: #dfd;
}
</style>
