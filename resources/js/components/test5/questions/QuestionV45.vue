<template>
    <div class="test-block">
        <div class="test-number number">
            {{ ordinalNumber }} <b>/ {{ questions }}</b>
        </div>
        <div
            class="test-main test-main-45 test-exercise-in-topical-diagnostics"
        >
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
                        <b>Дано:</b><br/>
                        поражена левая половина спинного мозга на уровне Th3.
                        <br/>
                        Рассмотрите на схеме чувствительные пути, разрушенные
                        патологическим процессом (1, 2, 3 на сером фоне
                        патологического очага).
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
                                Перемещайте картинку вверх-вниз, влево-вправо и
                                увеличивайте чтобы увидеть ее целиком
                            </p>
                        </div>
                    </div>
                </div>
                <div class="compliance-img">
                    <img
                        :src="currentUrl + '/test-img/test97.png'"
                        alt="courses"
                    />
                </div>
                <div class="compliance-block">
                    <div class="test-explanation test-explanation-desc">
                        <p class="explanation-txt">
                            <b>Дано:</b><br/>
                            поражена левая половина спинного мозга на уровне
                            Th3.
                            <br/>
                            Рассмотрите на схеме чувствительные пути,
                            разрушенные патологическим процессом (1, 2, 3 на
                            сером фоне патологического очага).
                        </p>
                    </div>
                    <ul>
                        <li v-for="(item, index) in answers" :key="index">
                            <p class="compliance-txt">
                                {{ item.symbol }}) {{
                                    item.description1
                                }}<img
                                :src="currentUrl + '/' + item.image"
                                alt="courses"
                            />{{ item.description2 }}
                            </p>
                            <input
                                type="text"
                                class="test-input compliance-input"
                                v-model="answer[index].result"
                                v-bind:class="{
                                    correct:
                                        correct(
                                            answer[index].result,
                                            answer[index].correct
                                        ) == 1,
                                    incorrect:
                                        correct(
                                            answer[index].result,
                                            answer[index].correct
                                        ) == 0
                                }"
                                :readonly="serverAnswers"
                            />
                        </li>
                    </ul>
                    <p class="compliance-txt">
                        Ж) Изобразите это на фигуре человека
                    </p>
                    <div id="stage-parent45">
                        <div v-if="!completed" id="question_45"></div>
                        <div v-if="completed" id="question_45">
                            <img
                                :src="currentUrl + '/test-img/answer45.png'"
                                alt="courses"
                                v-bind:class="{
                                    correct:
                                        correctArray(
                                            answer[6].result,
                                            answer[6].correct
                                        ) == 1,
                                    incorrect:
                                        correctArray(
                                            answer[6].result,
                                            answer[6].correct
                                        ) == 0
                                }"
                            />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
var stage45 = null;

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
        completed: {
            type: Boolean
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
    data() {
        return {
            currentUrl: "",
            answerList: [],
            testPass: false,
            answers: [
                {
                    part: 0,
                    symbol: "А",
                    description1:
                        " Укажите синдром анестезии, обусловленный поражением проводников глубокой (",
                    image: "test-img/icon3.png",
                    description2: ") чувствительности.",
                    result: null
                },
                {
                    part: 0,
                    symbol: "Б",
                    description1:
                        " Укажите синдром анестезии, обусловленный поражением проводников поверхностной (",
                    image: "test-img/icon4.png",
                    description2: ") чувствительности.",
                    result: null
                },
                {
                    part: 0,
                    symbol: "В",
                    description1:
                        " На какой стороне разовьется анестезия, обусловленный поражением проводников глубокой (",
                    image: "test-img/icon3.png",
                    description2: ") чувствительности?",
                    result: null
                },
                {
                    part: 0,
                    symbol: "Г",
                    description1:
                        " На какой стороне разовьется анестезия, обусловленный поражением проводников поверхностной (",
                    image: "test-img/icon4.png",
                    description2: ") чувствительности?",
                    result: null
                },
                {
                    part: 0,
                    symbol: "Д",
                    description1:
                        " Синдром составьте самостоятельно (тип анастезии) (",
                    image: "test-img/icon4.png",
                    description2: ")",
                    result: null
                },
                {
                    part: 0,
                    symbol: "Е",
                    description1:
                        " Синдром составьте самостоятельно (сторона анастезии) (",
                    image: "test-img/icon4.png",
                    description2: ")",
                    result: null
                }
            ],
            answer: [
                {
                    result: null,
                    correct:
                        "Проводниковая анестезия глубокой чувствительности с Th3"
                },
                {
                    result: null,
                    correct:
                        "Проводниковая анестезия поверхностной чувствительности с Th5"
                },
                {
                    result: null,
                    correct: "Слева"
                },
                {
                    result: null,
                    correct: "Справа"
                },
                {
                    result: null,
                    correct: "Сегментарная анестезия Th3"
                },
                {
                    result: null,
                    correct: "Слева"
                },
                {
                    result: [],
                    correct: [
                        "a path piece 3 rect answer 1",
                        "a path piece 0 rect answer 2",
                        "a path piece 1 rect answer 3"
                    ]
                }
            ],
            body45: [
                "M 111.09,141.09 C 109.08,153.24 108.98,158.96 109.00,171.00 109.00,171.00 117.00,238.00 117.00,238.00 117.14,250.48 116.27,261.77 113.58,274.00 111.67,282.66 107.70,292.29 108.04,301.00 108.58,314.97 114.30,336.28 112.42,350.00 111.09,359.76 107.96,368.03 108.00,378.00 108.03,384.67 111.70,398.71 107.44,403.72 103.20,408.71 92.84,407.12 87.00,407.00 87.00,407.00 92.51,384.00 92.51,384.00 92.51,384.00 92.51,375.00 92.51,375.00 92.83,371.43 94.82,368.75 94.71,365.00 94.71,365.00 89.17,341.00 89.17,341.00 87.46,325.77 89.84,321.73 90.82,308.00 91.38,300.15 86.70,289.98 85.22,282.00 85.22,282.00 83.31,246.84 83.31,246.84 83.07,234.62 84.64,142.36 84.45,139.18 88.43,138.87 107.55,141.36 111.09,141.09 Z",
                "M 111.09,141.13 C 110.18,143.68 113.68,133.85 113.13,127.39 107.68,127.85 88.38,127.69 84.57,127.78 84.57,129.69 84.35,137.65 84.48,139.17 88.26,138.87 105.72,141.22 111.09,141.13 Z",
                "M 57.13,139.02 C 60.57,138.89 83.08,139.28 84.49,139.16 84.27,137.33 84.61,127.78 84.61,127.78 84.61,127.78 109.61,127.70 113.09,127.39 113.70,130.09 113.87,128.91 114.22,131.09 116.52,132.57 114.57,160.13 117.04,170.00 117.04,170.00 121.53,181.00 121.53,181.00 123.76,187.75 124.72,193.25 127.89,200.00 127.89,200.00 142.05,225.00 142.05,225.00 145.50,234.28 140.77,254.03 154.00,256.51 158.10,257.28 161.34,253.90 161.67,250.00 162.02,245.81 158.23,241.58 157.00,235.00 157.00,235.00 167.00,235.00 167.00,235.00 162.02,231.70 159.53,231.26 155.39,226.00 149.91,219.03 149.60,206.72 147.37,198.00 143.97,184.70 139.02,180.43 139.00,166.00 138.97,146.74 139.98,121.74 131.68,104.00 128.83,97.91 124.54,92.74 119.00,88.90 110.99,83.35 101.64,80.51 98.06,70.00 96.76,65.99 97.68,63.04 98.06,59.00 98.44,54.56 111.62,41.50 109.08,20.00 107.91,13.35 105.47,6.43 99.00,3.17 95.53,1.43 89.77,1.94 86.00,2.47 67.65,6.78 65.97,15.46 66.00,32.00 66.02,45.63 74.12,54.62 74.00,59.00 75.67,64.16 77.23,70.76 74.91,75.99 71.89,82.82 64.01,85.43 58.00,88.87 50.35,93.25 42.68,99.20 38.35,107.00 31.23,119.80 33.16,135.89 33.00,150.00 33.00,150.00 32.00,163.00 32.00,163.00 31.75,184.93 27.40,182.75 23.13,200.00 23.13,200.00 18.98,222.96 18.98,222.96 17.44,225.78 7.11,232.54 4.00,234.00 7.86,236.50 9.68,236.04 14.00,235.00 12.71,243.25 10.90,246.15 3.00,249.00 9.92,256.82 21.38,255.42 26.16,246.00 29.43,239.56 26.42,237.31 31.17,230.00 39.33,217.42 42.30,206.58 47.42,193.00 51.61,181.90 54.98,180.37 54.92,168.00 54.92,168.00 54.92,149.00 54.92,149.00 54.29,143.32 53.11,134.49 54.00,129.00 57.45,135.02 56.87,136.94 57.13,139.02 Z",
                "M 57.12,139.00 C 57.12,139.00 58.00,179.00 58.00,179.00 57.98,191.29 54.61,204.86 52.42,217.00 49.30,234.32 48.80,238.39 49.00,256.00 49.00,256.00 55.00,308.00 55.00,308.00 55.00,308.00 53.01,334.00 53.01,334.00 52.67,349.10 61.13,370.25 57.71,383.00 56.48,387.59 49.92,400.32 53.75,404.18 55.61,406.04 67.24,407.83 69.72,406.94 71.25,406.39 71.96,405.38 72.42,403.87 73.59,400.01 70.71,386.52 70.13,382.00 70.13,382.00 70.89,367.00 70.89,367.00 70.89,367.00 73.39,355.00 73.39,355.00 74.95,346.75 76.21,338.38 76.63,330.00 76.63,330.00 75.04,312.00 75.04,312.00 74.68,302.78 78.77,294.02 80.25,285.00 82.50,271.24 83.32,260.60 83.29,246.84 83.13,235.87 84.48,142.31 84.48,139.16 81.85,139.23 65.44,139.00 57.12,139.00 Z"
            ],
            colorRect: "",
            question_45Width: 367,
            question_45Height: 430
        };
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
        },
        correctTest(answer, correct) {
            if (!this.serverAnswers) {
                return null;
            }

            if (answer === correct) {
                return 1;
            }

            return 0;
        },
        correctArray(a, b) {
            if (!this.serverAnswers) {
                return null;
            }

            if (this.equals(a, b)) {
                return 1;
            }

            return 0;
        },
        equals(a, b) {
            if (a.length !== b.length) {
                return false;
            }

            var seen = {};
            a.forEach(function (v) {
                var key = typeof v + v;
                if (!seen[key]) {
                    seen[key] = 0;
                }
                seen[key] += 1;
            });

            return b.every(function (v) {
                var key = typeof v + v;
                if (seen[key]) {
                    seen[key] -= 1;
                    return true;
                }
            });
        },
        getRandomColor() {
            var letters = "0123456789ABCDEF";
            var color = "#";
            for (var i = 0; i < 6; i++) {
                color += letters[Math.floor(Math.random() * 16)];
            }
            return color;
        },
        fitStageIntoParentContainer() {
            var container = document.querySelector("#stage-parent45");

            // now we need to fit stage into parent
            //var containerWidth = container.offsetWidth;
            // to do this we need to scale the stage
            //var scale = containerWidth / this.question_45Width;
            var scale = 0.8;

            stage45.width(this.question_45Width * scale);
            stage45.height(this.question_45Height * scale);
            stage45.scale({
                x: scale,
                y: scale
            });
            stage45.draw();
        },

        onStart() {
            const self = this;
            this.answerList = [];
            stage45 = new Konva.Stage({
                container: "question_45",
                width: this.question_45Width,
                height: this.question_45Height
            });
            var templayer45 = new Konva.Layer();
            var layer45 = new Konva.Layer();
            var group45 = new Konva.Group();
            var answerList45 = [];
            stage45.add(layer45);
            stage45.add(templayer45);
            var path45;
            for (var i = 0; i < this.body45.length; i++) {
                path45 = new Konva.Path({
                    x: 0,
                    y: 0,
                    fill: "#f5f5f5",
                    data: this.body45[i],
                    name: "a path piece " + i,
                    numPoints: 10,
                    innerRadius: 20,
                    outerRadius: 25
                });
                layer45.add(path45);
            }
            var rectungle45;
            var text45;
            var borderOfRect45;

            borderOfRect45 = new Konva.Rect({
                cornerRadius: 5,
                x: 180,
                y: 0,
                width: 164,
                height: 55,
                fill: "#f5f5f5",
                stroke: "#e6e6e6",
                strokeWidth: 1
            });
            group45.add(borderOfRect45);
            rectungle45 = new Konva.Rect({
                cornerRadius: 5,
                x: 195,
                y: 15,
                width: 25,
                height: 25,
                name: "rect answer 1",
                fill: this.getRandomColor(),
                draggable: true
            });
            group45.add(rectungle45);
            text45 = new Konva.Text({
                x: 235,
                y: 22,
                draggable: false,
                fill: "black",
                text: "Поверхностная"
            });
            group45.add(text45);

            borderOfRect45 = new Konva.Rect({
                cornerRadius: 5,
                x: 180,
                y: 65,
                width: 164,
                height: 55,
                fill: "#f5f5f5",
                stroke: "#e6e6e6",
                strokeWidth: 1
            });
            group45.add(borderOfRect45);
            rectungle45 = new Konva.Rect({
                cornerRadius: 5,
                x: 195,
                y: 80,
                width: 25,
                height: 25,
                name: "rect answer 2",
                fill: this.getRandomColor(),
                draggable: true
            });
            group45.add(rectungle45);
            text45 = new Konva.Text({
                x: 235,
                y: 87,
                draggable: false,
                fill: "black",
                text: "Глубокая"
            });
            group45.add(text45);

            borderOfRect45 = new Konva.Rect({
                cornerRadius: 5,
                x: 180,
                y: 130,
                width: 164,
                height: 55,
                fill: "#f5f5f5",
                stroke: "#e6e6e6",
                strokeWidth: 1
            });
            group45.add(borderOfRect45);
            rectungle45 = new Konva.Rect({
                cornerRadius: 5,
                x: 195,
                y: 145,
                width: 25,
                height: 25,
                name: "rect answer 3",
                fill: this.getRandomColor(),
                draggable: true
            });
            group45.add(rectungle45);
            text45 = new Konva.Text({
                x: 235,
                y: 153,
                draggable: false,
                fill: "black",
                text: "Обе"
            });
            group45.add(text45);

            borderOfRect45 = new Konva.Rect({
                cornerRadius: 5,
                x: 180,
                y: 195,
                width: 164,
                height: 55,
                fill: "#f5f5f5",
                stroke: "#e6e6e6",
                strokeWidth: 1
            });
            group45.add(borderOfRect45);
            var clear_rectungle45;
            clear_rectungle45 = new Konva.Rect({
                cornerRadius: 5,
                x: 195,
                y: 210,
                width: 25,
                height: 25,
                name: "rectungle сlear",
                fill: "#f5f5f5",
                stroke: "black",
                strokeWidth: 2,
                draggable: false
            });
            group45.add(clear_rectungle45);
            text45 = new Konva.Text({
                x: 235,
                y: 217,
                draggable: false,
                fill: "black",
                text: "Очистить"
            });
            group45.add(text45);

            Konva.Image.fromURL(
                `${this.currentUrl}/test-img/test39.png`,
                function (darthNode) {
                    darthNode.setAttrs({
                        x: 0,
                        y: 0,
                        scaleX: 1,
                        scaleY: 1
                    });
                    templayer45.add(darthNode);
                    templayer45.batchDraw();
                }
            );

            templayer45.add(group45);
            templayer45.draw();
            layer45.draw();

            stage45.on("dragstart", function (e) {
                e.target.moveTo(templayer45);
                this.colorRect = e.target.fill();
                //console.log("Moving " + e.target.name());
                layer45.draw();
            });

            var previousShape;
            stage45.on("dragmove", function (evt) {
                var pos = stage45.getPointerPosition();
                var shape = layer45.getIntersection(pos);
                if (previousShape && shape) {
                    if (previousShape !== shape) {
                        // leave from old targer
                        previousShape.fire(
                            "dragleave",
                            {
                                type: "dragleave",
                                target: previousShape,
                                evt: evt.evt
                            },
                            true
                        );

                        // enter new targer
                        shape.fire(
                            "dragenter",
                            {
                                type: "dragenter",
                                target: shape,
                                evt: evt.evt
                            },
                            true
                        );
                        previousShape = shape;
                    } else {
                        previousShape.fire(
                            "dragover",
                            {
                                type: "dragover",
                                target: previousShape,
                                evt: evt.evt
                            },
                            true
                        );
                    }
                } else if (!previousShape && shape) {
                    previousShape = shape;
                    shape.fire(
                        "dragenter",
                        {
                            type: "dragenter",
                            target: shape,
                            evt: evt.evt
                        },
                        true
                    );
                } else if (previousShape && !shape) {
                    previousShape.fire(
                        "dragleave",
                        {
                            type: "dragleave",
                            target: previousShape,
                            evt: evt.evt
                        },
                        true
                    );
                    previousShape = undefined;
                }
            });
            var ansKube45 = {};
            stage45.on("dragend", function (e) {
                var pos = stage45.getPointerPosition();
                var shape = layer45.getIntersection(pos);
                if (shape) {
                    previousShape.fire(
                        "drop",
                        {
                            type: "drop",
                            target: previousShape,
                            evt: e.evt
                        },
                        true
                    );
                }
                if (previousShape != undefined) {
                    ansKube45.numOfRect = e.target.name();
                    self.answerList.push(ansKube45);
                    //answerList45.push(ansKube45);
                    e.target.destroy();
                    ansKube45 = {};
                }
                previousShape = undefined;
                layer45.draw();
                templayer45.draw();
            });

            stage45.on("dragenter", function (e) {
                e.target.fill("red");
                //console.log("dragenter " + e.target.name());
                layer45.draw();
            });

            stage45.on("dragleave", function (e) {
                e.target.fill("#f5f5f5");
                //console.log("dragleave " + e.target.name());
                layer45.draw();
            });

            stage45.on("dragover", function (e) {
                //console.log("dragover " + e.target.name());
                layer45.draw();
            });

            stage45.on("drop", function (e) {
                e.target.fill(this.colorRect);
                //console.log("drop " + e.target.name());
                ansKube45.numOfPath = e.target.name();
                //console.log(answerList45);
                e.target.moveTo(templayer45);
                this.colorRect = "";
                layer45.draw();
            });
            this.fitStageIntoParentContainer();
            clear_rectungle45.on("click", this.onStart);
            clear_rectungle45.on("tap", this.onStart);
        }
    },
    watch: {
        answerList: {
            handler: function (newVal, oldVal) {
                this.answer[6].result = [];
                this.answerList.forEach(element => {
                    this.answer[6].result.push(
                        `${element.numOfPath} ${element.numOfRect}`
                    );
                });
            },
            deep: true
        },
        answer: {
            handler: function (newVal, oldVal) {
                this.$emit("answer", {
                    question_index: 45,
                    answer: this.answer
                });
            },
            deep: true
        }
    },
    mounted() {
        if (!this.completed)
        {
            setTimeout(() => {
                this.onStart();
                let swiper = document.querySelector(".test-swiper").swiper
                swiper.update()
            }, 2000)
        }
    },
    created() {
        this.currentUrl = window.location.origin;
        window.addEventListener("resize", this.fitStageIntoParentContainer);
        // вывести ответы пользователя, если попытка завершена
        if (this.currentQuestionAnswers) {
            this.answer = this.currentQuestionAnswers.answer;
        }
    },
    computed: {
        currentQuestionAnswers() {
            if (!this.serverAnswers) {
                return null;
            }

            return this.serverAnswers.find(x => x.question_index == "45");
        }
    }
};
</script>
