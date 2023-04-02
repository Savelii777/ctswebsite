<template>
    <div class="test-block">
        <div class="test-number number mr-2" style="white-space:nowrap">
            {{ ordinalNumber }} <b>/ {{ questions }}</b>
        </div>
        <div class="test-main test-drag test-drag81-01">
            <div class="test-caption">
                <p>
                    Схема связей ядер экстрапирамидной системы
                    <span>
                    (ansa lenticularis)
                </span>
                </p>
                <div class="test-number number" style="width: 100%;">
                    <b>Карточка книги <span style="font-weight: 700; display: inline;">№{{ number }}</span></b>
                </div>
            </div>
            <div class="test-compliance">
                <div class="test-explanation-mob">
                    <div class="test-explanation">
                        <p class="explanation-txt">
                            Выберите то что нужно и наведите на рисунок,
                            закрасьте все соответвующие элементы.
                        </p>
                    </div>
                    <ul class="compliance-block-btn">
                        <div class="row">
                            <drag
                                class="col-md-6 col-6 drag"
                                v-for="(item, index) in groups"
                                :key="index"
                                :transfer-data="{ item, example: 'groups' }"
                                @dragstart="dragging = item"
                                @dragend="dragging = null"
                            >
                                <li>
                                    <button>
                                        <p v-if="item.text">{{ item.text }}</p>
                                        <img
                                            v-if="item.image"
                                            :src="item.image"
                                            class="mx-auto d-block"
                                        />
                                    </button>
                                </li>
                            </drag>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <li>
                                    <button>
                                        <p class="mx-auto d-block">очистить</p>
                                    </button>
                                </li>
                            </div>
                        </div>
                    </ul>
                </div>
                <div class="compliance-img-81-01">
                    <img
                        :src="currentUrl + '/test-img/81ans.png'"
                        alt="courses"
                    />
                </div>
                <div class="compliance-block compliance-block-81">
                    <div class="test-explanation test-explanation-desc">
                        <p class="explanation-txt">
                            <b>Дано:</b>
                            <br/>Внимательно рассмотрите два этажа связей
                            (нумерация та же, что и на карте 80). <br/>1-й: от
                            neostriatum – к pallidum <br/>2-й: от бледного шара
                            – <br/>
                            – к вентральному ядру зрительного бугра, <br/>
                            – к льюисовым телам, <br/>
                            – к красным ядрам, <br/>
                            – к черной субстанции.
                        </p>
                    </div>
                </div>
            </div>

            <p class="explanation-txt-blue">
                А теперь вы должны самостоятельно вписать все эти
                экстрапирамидные <br/>связи в схему на следующей странице.
            </p>

            <div id="stage-parent81" class="test-compliance">
                <div
                    v-if="!completed"
                    id="question_81"
                    class="compliance-img"
                ></div>
                <div v-if="completed" id="question_81">
                    <div style="display: flex; justify-content: center;">
                        <img
                            :src="currentUrl + '/test-img/answer81.png'"
                            alt="courses"
                            v-bind:class="{
                                correct: correct == 1,
                                incorrect: correct == 0
                            }"
                        />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
var stage81 = null;
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
    created() {
        this.currentUrl = window.location.origin;
    },
    data() {
        return {
            groups: [],
            body81: [
                {
                    id: 9,
                    data:
                        "M 249.36,136.64 C 251.44,143.14 250.82,150.18 250.73,154.18 249.91,160.64 245.55,174.36 243.18,180.18 243.18,180.27 241.00,179.64 241.00,179.64 241.00,179.64 241.45,188.18 241.45,188.18 241.45,188.18 248.73,182.91 248.73,182.91 248.73,182.91 246.82,181.27 246.82,181.27 246.82,181.27 254.39,162.65 254.91,155.27 254.91,155.27 255.30,142.06 253.82,136.36 253.82,136.36 249.36,136.64 249.36,136.64 Z"
                },
                {
                    id: 9,
                    data:
                        "M 253.81,198.88 C 253.81,198.88 245.81,193.19 245.81,193.19 245.81,193.19 254.25,190.75 254.25,190.75 254.25,190.75 254.31,192.25 254.31,192.25 264.71,192.31 275.81,177.50 275.75,177.81 276.06,178.12 278.88,180.50 279.19,180.81 274.06,189.81 264.78,196.74 254.00,196.06 254.00,196.06 253.81,198.88 253.81,198.88 Z"
                },
                {
                    id: 9,
                    data:
                        "M 218.73,286.09 C 218.73,286.09 208.36,286.73 208.36,286.73 208.36,286.73 211.82,277.82 211.82,277.82 211.82,277.82 214.00,280.06 214.00,280.06 232.45,265.27 246.57,233.34 244.50,214.38 244.50,214.38 249.69,214.31 249.69,214.31 249.33,248.47 230.42,270.86 217.38,284.19 217.38,284.19 218.73,286.09 218.73,286.09 Z"
                },
                {
                    id: 9,
                    data:
                        "M 215.25,261.38 C 208.66,266.28 198.92,269.02 189.25,271.00 178.42,272.64 153.76,272.30 139.62,269.38 139.38,269.50 140.38,266.75 140.38,266.75 140.38,266.75 131.62,268.38 131.62,268.38 131.62,268.38 137.12,274.88 137.12,274.88 137.12,274.88 138.00,272.50 138.00,272.50 155.75,277.25 177.88,277.78 190.12,276.00 208.80,270.79 209.25,269.75 220.00,262.75 229.88,255.12 239.62,246.05 242.25,212.00 242.25,212.00 237.38,211.88 237.38,211.88 237.25,240.62 226.38,253.75 215.25,261.38 Z"
                },
                {
                    id: 9,
                    data:
                        "M 242.27,212.09 C 239.27,247.73 229.27,255.73 219.91,262.73 219.91,262.73 211.40,261.44 211.40,261.44 211.40,261.44 211.02,263.00 211.02,263.00 211.02,263.00 203.64,258.84 203.64,258.84 203.64,258.84 212.29,256.00 212.29,256.00 212.29,256.00 212.04,257.71 212.04,257.71 212.04,257.71 219.91,257.69 219.91,257.69 227.27,252.18 237.27,238.36 237.45,211.91 237.45,211.91 242.27,212.09 242.27,212.09 Z"
                },
                {
                    id: 9,
                    data:
                        "M 184.91,221.45 C 184.92,221.46 176.81,223.17 166.18,219.91 166.18,219.91 167.91,217.36 167.91,217.36 167.91,217.36 159.36,216.45 159.36,216.45 159.36,216.45 162.27,224.09 162.27,224.09 162.27,224.09 164.00,222.18 164.00,222.18 171.79,228.05 184.82,226.18 184.82,226.18 210.18,220.51 229.66,206.99 229.64,207.00 229.64,207.00 227.18,203.55 227.18,203.55 227.18,203.55 219.68,211.79 184.91,221.45 Z"
                },
                {
                    id: 9,
                    data:
                        "M 227.20,203.58 C 227.25,203.59 208.53,207.70 201.27,206.64 201.27,206.64 201.55,204.73 201.55,204.73 201.55,204.73 193.18,207.91 193.18,207.91 193.18,207.91 200.27,212.91 200.27,212.91 200.27,212.91 200.45,211.09 200.45,211.09 214.21,211.54 229.72,207.02 229.67,207.02 229.67,207.02 227.20,203.58 227.20,203.58 Z"
                },
                {
                    id: 9,
                    data:
                        "M 220.75,191.44 C 220.75,191.44 200.25,194.50 192.00,187.81 186.18,184.64 193.06,171.69 193.06,171.69 193.06,171.69 194.94,172.69 194.94,172.69 194.94,172.69 195.50,163.81 195.50,163.81 195.50,163.81 188.25,168.38 188.25,168.38 188.25,168.38 189.94,169.50 189.94,169.50 181.40,182.11 188.52,191.49 188.91,190.91 196.78,200.20 222.55,196.18 222.55,196.18 222.55,196.18 220.75,191.44 220.75,191.44 Z"
                },
                {
                    id: 1,
                    data:
                        "M 141.73,141.55 C 141.73,141.55 145.82,137.36 145.82,137.36 145.82,137.36 148.00,137.36 148.00,137.36 148.00,137.36 148.27,154.82 148.27,154.82 148.27,154.82 145.73,154.91 145.73,155.00 145.73,155.09 145.55,140.45 145.55,140.45 145.55,140.45 143.55,142.45 143.55,142.45 143.55,142.45 141.73,141.55 141.73,141.55 Z"
                },
                {
                    id: 2,
                    data:
                        "M 98.18,110.64 C 95.86,115.79 90.00,120.19 90.00,120.18 90.00,120.18 90.36,123.09 90.36,123.09 90.36,123.09 101.36,123.00 101.36,123.00 101.36,123.00 101.27,120.00 101.27,120.00 101.27,120.00 94.91,119.91 94.91,119.91 94.91,119.91 99.35,117.09 101.55,111.36 101.03,109.38 102.52,107.36 98.18,104.91 98.36,104.62 91.67,104.49 90.64,106.18 90.64,106.18 91.09,108.82 91.09,108.82 93.91,108.00 99.09,106.82 98.18,110.64 Z"
                },
                {
                    id: 3,
                    data:
                        "M 60.96,179.17 C 60.96,179.17 64.00,179.00 64.00,179.00 64.26,178.79 65.62,180.07 65.36,180.27 65.36,180.27 65.55,182.36 65.55,182.36 65.58,182.36 64.61,183.46 63.55,183.55 62.55,184.13 59.80,183.83 59.82,183.82 59.82,183.82 59.92,185.96 59.92,185.96 59.92,185.95 63.62,185.53 64.10,186.59 64.06,186.52 65.50,187.21 65.76,187.68 65.80,187.63 66.54,189.55 65.94,190.22 66.11,190.25 65.65,191.81 64.55,191.64 64.67,191.67 63.52,192.30 61.82,191.82 61.82,191.82 61.11,190.84 59.00,190.00 59.00,190.00 57.09,191.64 57.09,191.64 57.08,191.63 58.41,193.89 60.09,194.45 60.09,194.45 63.27,195.22 65.82,194.55 65.81,194.55 68.24,193.74 69.18,191.36 69.19,191.41 69.47,189.88 69.09,187.18 68.81,185.72 66.51,184.53 66.09,184.73 66.07,184.77 67.78,184.57 68.45,182.91 69.10,180.57 69.91,179.26 67.82,177.45 67.39,177.48 62.39,174.71 58.64,177.64 58.64,177.64 58.64,180.18 58.64,180.18 58.63,180.20 60.78,180.63 60.96,179.17 Z"
                },
                {
                    id: 4,
                    data:
                        "M 99.91,194.00 C 99.91,194.00 103.27,193.73 103.27,193.73 103.27,193.73 103.27,176.91 103.27,176.91 103.27,176.91 99.09,176.91 99.09,176.91 99.09,176.91 90.36,190.00 90.36,190.00 90.36,190.00 105.36,190.18 105.36,190.18 105.36,190.18 105.36,187.09 105.36,187.09 105.36,187.09 95.91,186.82 95.91,186.82 95.91,186.82 99.91,181.45 99.91,181.45 99.91,181.45 99.91,194.00 99.91,194.00 Z"
                },
                {
                    id: 5,
                    data:
                        "M 138.04,202.17 C 138.04,202.17 138.13,205.04 138.13,205.04 141.81,204.57 144.35,208.78 144.35,208.78 144.99,211.73 144.26,213.61 144.26,213.61 142.24,216.49 140.00,216.96 140.00,216.96 136.74,217.12 133.82,215.83 133.83,215.83 133.83,215.83 133.91,212.65 133.91,212.65 134.92,214.52 140.00,214.00 140.00,213.96 142.90,211.40 140.98,209.47 139.91,208.00 139.91,208.00 134.96,207.91 134.96,207.91 134.96,207.91 134.87,199.00 134.87,199.00 134.87,199.00 144.48,199.00 144.48,199.00 144.48,199.00 144.35,201.83 144.35,201.83 144.35,201.83 138.04,202.17 138.04,202.17 Z"
                },
                {
                    id: 7,
                    data:
                        "M 121.62,257.06 C 121.62,257.06 133.06,257.12 133.06,257.12 133.06,257.12 133.12,260.00 133.12,260.00 133.12,260.00 125.81,274.44 125.81,274.44 125.81,274.44 122.06,274.50 122.06,274.50 122.06,274.50 129.38,261.12 129.38,261.12 129.38,261.12 129.44,259.50 129.44,259.50 129.44,259.50 121.56,259.69 121.56,259.69 121.56,259.69 121.62,257.06 121.62,257.06 Z"
                },
                {
                    id: 8,
                    data:
                        "M 156.82,295.78 C 156.82,295.73 153.51,296.38 151.33,297.98 151.33,297.98 148.02,299.84 148.91,303.71 149.87,305.54 150.16,307.64 156.56,307.16 158.76,306.50 160.91,305.51 160.24,301.38 160.00,297.84 153.12,297.11 152.01,294.52 151.96,294.52 152.02,291.80 155.24,292.11 157.02,292.44 157.87,294.22 156.80,295.76 156.80,295.80 157.73,297.57 157.73,297.57 160.24,296.43 160.18,293.51 160.18,293.51 159.77,290.81 157.48,289.11 154.78,289.31 150.44,289.58 149.36,291.83 149.13,294.20 150.18,298.04 158.96,299.43 158.31,302.17 157.84,305.07 155.31,305.02 155.31,305.02 150.99,305.02 151.40,302.04 151.40,302.04 151.60,299.38 157.76,297.60 157.76,297.60 157.76,297.60 156.82,295.82 156.82,295.78 Z"
                }
            ],
            complited81: false,
            draggetItem: null,
            question_81Width: 645,
            question_81Height: 700
        };
    },
    watch: {
        complited81: {
            handler: function (newVal, oldVal) {
                this.$emit("answer", {
                    question_index: 81,
                    answer: [{result: this.complited81}]
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
    methods: {
        fitStageIntoParentContainer() {
            var container = document.querySelector("#stage-parent81");

            // now we need to fit stage into parent
            //var containerWidth = container.offsetWidth;
            // to do this we need to scale the stage
            var scale = 0.94;

            stage81.width(this.question_81Width * scale);
            stage81.height(this.question_81Height);
            stage81.scale({
                x: scale,
                y: scale
            });
            stage81.draw();
        },

        onStart() {
            let self = this;
            stage81 = new Konva.Stage({
                container: "question_81",
                width: this.question_81Width,
                height: this.question_81Height
            });

            var templayer81 = new Konva.Layer();
            var layer81 = new Konva.Layer();
            var group81 = new Konva.Group();
            var answerList81 = [];
            stage81.add(layer81);
            stage81.add(templayer81);
            var path81Front;

            var test77one;
            Konva.Image.fromURL(`${this.currentUrl}/test-img/81.png`, function (
                test77one
            ) {
                test77one.setAttrs({
                    x: 0,
                    y: 275,
                    scaleX: 1,
                    scaleY: 1
                });
                templayer81.add(test77one);
                templayer81.batchDraw();
            });

            for (var i = 0; i < this.body81.length; i++) {
                path81Front = new Konva.Path({
                    x: 20,
                    y: 285,
                    fill: "#f5f5f5", //"",
                    data: this.body81[i].data,
                    numPoints: 10,
                    innerRadius: 20,
                    outerRadius: 25,
                    scaleX: 1,
                    scaleY: 1,
                    id: this.body81[i].id
                });
                layer81.add(path81Front);
            }

            var borderOfRect81;
            var arrowButton = new Image();
            Konva.Image.fromURL(
                `${this.currentUrl}/test-img/arrowRight.png`,
                function (arrowButton) {
                    arrowButton.setAttrs({
                        x: 77,
                        y: 210,
                        scaleX: 1.1,
                        scaleY: 1.1,
                        draggable: true,
                        id: 9
                    });
                    templayer81.add(arrowButton);
                    templayer81.batchDraw();
                }
            );
            var signature81;
            signature81 = new Konva.Text({
                x: 0,
                y: 0,
                width: 350,
                draggable: false,
                fill: "#818181",
                text:
                    "Выберите то что нужно и наведите на рисунок, закрасьте все соответствующие эелементы"
            });
            group81.add(signature81);
            signature81.fontFamily("Fira Sans");
            signature81.fontSize(14);
            signature81.fontStyle(100);

            borderOfRect81 = new Konva.Rect({
                cornerRadius: 5,
                x: 31,
                y: 55,
                width: 54,
                height: 54,
                fill: "#f5f5f5",
                stroke: "#e6e6e6",
                strokeWidth: 1
            });
            group81.add(borderOfRect81);

            signature81 = new Konva.Text({
                x: 54,
                y: 74,
                draggable: true,
                fill: "#333333",
                text: "1",
                id: 1
            });
            group81.add(signature81);
            signature81.fontFamily("Fira Sans");
            signature81.fontSize(21);
            signature81.fontStyle(300);

            borderOfRect81 = new Konva.Rect({
                cornerRadius: 5,
                x: 100,
                y: 55,
                width: 54,
                height: 54,
                fill: "#f5f5f5",
                stroke: "#e6e6e6",
                strokeWidth: 1
            });
            group81.add(borderOfRect81);
            signature81 = new Konva.Text({
                x: 123,
                y: 74,
                draggable: true,
                fill: "#333333",
                text: "2",
                id: 2
            });
            group81.add(signature81);
            signature81.fontFamily("Fira Sans");
            signature81.fontSize(21);
            signature81.fontStyle(300);

            borderOfRect81 = new Konva.Rect({
                cornerRadius: 5,
                x: 168,
                y: 55,
                width: 54,
                height: 54,
                fill: "#f5f5f5",
                stroke: "#e6e6e6",
                strokeWidth: 1
            });
            group81.add(borderOfRect81);
            signature81 = new Konva.Text({
                x: 192,
                y: 74,
                draggable: true,
                fill: "#333333",
                text: "3",
                id: 3
            });
            group81.add(signature81);
            signature81.fontFamily("Fira Sans");
            signature81.fontSize(21);
            signature81.fontStyle(300);

            borderOfRect81 = new Konva.Rect({
                cornerRadius: 5,
                x: 238,
                y: 55,
                width: 54,
                height: 54,
                fill: "#f5f5f5",
                stroke: "#e6e6e6",
                strokeWidth: 1
            });
            group81.add(borderOfRect81);
            signature81 = new Konva.Text({
                x: 261,
                y: 74,
                draggable: true,
                fill: "#333333",
                text: "4",
                id: 4
            });
            group81.add(signature81);
            signature81.fontFamily("Fira Sans");
            signature81.fontSize(21);
            signature81.fontStyle(300);

            borderOfRect81 = new Konva.Rect({
                cornerRadius: 5,
                x: 31,
                y: 124,
                width: 54,
                height: 54,
                fill: "#f5f5f5",
                stroke: "#e6e6e6",
                strokeWidth: 1
            });
            group81.add(borderOfRect81);
            signature81 = new Konva.Text({
                x: 54,
                y: 143,
                draggable: true,
                fill: "#333333",
                text: "5",
                id: 5
            });
            group81.add(signature81);
            signature81.fontFamily("Fira Sans");
            signature81.fontSize(21);
            signature81.fontStyle(300);

            borderOfRect81 = new Konva.Rect({
                cornerRadius: 5,
                x: 100,
                y: 124,
                width: 54,
                height: 54,
                fill: "#f5f5f5",
                stroke: "#e6e6e6",
                strokeWidth: 1
            });
            group81.add(borderOfRect81);
            signature81 = new Konva.Text({
                x: 123,
                y: 143,
                draggable: true,
                fill: "#333333",
                text: "6",
                id: 6
            });
            group81.add(signature81);
            signature81.fontFamily("Fira Sans");
            signature81.fontSize(21);
            signature81.fontStyle(300);

            borderOfRect81 = new Konva.Rect({
                cornerRadius: 5,
                x: 168,
                y: 124,
                width: 54,
                height: 54,
                fill: "#f5f5f5",
                stroke: "#e6e6e6",
                strokeWidth: 1
            });
            group81.add(borderOfRect81);

            signature81 = new Konva.Text({
                x: 192,
                y: 143,
                draggable: true,
                fill: "#333333",
                text: "7",
                id: 7
            });
            group81.add(signature81);
            signature81.fontFamily("Fira Sans");
            signature81.fontSize(21);
            signature81.fontStyle(300);

            borderOfRect81 = new Konva.Rect({
                cornerRadius: 5,
                x: 238,
                y: 124,
                width: 54,
                height: 54,
                fill: "#f5f5f5",
                stroke: "#e6e6e6",
                strokeWidth: 1
            });
            group81.add(borderOfRect81);

            signature81 = new Konva.Text({
                x: 261,
                y: 143,
                draggable: true,
                fill: "#333333",
                text: "8",
                id: 8
            });
            group81.add(signature81);
            signature81.fontFamily("Fira Sans");
            signature81.fontSize(21);
            signature81.fontStyle(300);

            borderOfRect81 = new Konva.Rect({
                cornerRadius: 5,
                x: 32,
                y: 193,
                width: 123,
                height: 54,
                fill: "#f5f5f5",
                stroke: "#e6e6e6",
                strokeWidth: 1
            });
            group81.add(borderOfRect81);

            borderOfRect81 = new Konva.Rect({
                cornerRadius: 5,
                x: 168,
                y: 193,
                width: 123,
                height: 54,
                fill: "#f5f5f5",
                stroke: "#e6e6e6",
                strokeWidth: 1
            });
            group81.add(borderOfRect81);

            var text81;
            text81 = new Konva.Text({
                x: 200,
                y: 214,
                draggable: false,
                fill: "black",
                text: "Очистить"
            });
            group81.add(text81);

            templayer81.add(group81);
            templayer81.draw();
            var targetPositionX;
            var targetPositionY;
            var counter81 = 0;
            stage81.on("dragstart", function (e) {
                e.target.moveTo(templayer81);
                targetPositionX = e.target.attrs.x;
                targetPositionY = e.target.attrs.y;
                self.draggetItem = e.target.attrs.id;
                //console.log(targetPositionX)
                //console.log('Moving ' + e.target.name());
                layer81.draw();
            });

            var previousShape;
            stage81.on("dragmove", function (evt) {
                var pos = stage81.getPointerPosition();
                var shape = layer81.getIntersection(pos);
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

            stage81.on("dragend", function (e) {
                var pos = stage81.getPointerPosition();
                var shape = layer81.getIntersection(pos);
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
                    e.target.setAttrs({
                        x: targetPositionX,
                        y: targetPositionY
                    });
                }
                console.log(counter81);
                if (counter81 === 15) {
                    self.complited81 = true;
                    //console.log(counter81);
                }
                previousShape = undefined;
                layer81.draw();
                templayer81.draw();
            });

            stage81.on("dragenter", function (e) {
                e.target.fill("red");
                layer81.draw();
            });

            stage81.on("dragleave", function (e) {
                e.target.fill("#f5f5f5");
                layer81.draw();
            });

            stage81.on("dragover", function (e) {
                layer81.draw();
            });

            stage81.on("drop", function (e) {
                if (e.target.attrs.id === self.draggetItem) {
                    e.target.fill("black");
                    e.target.moveTo(templayer81);
                    counter81++;
                } else {
                    e.target.fill("#f5f5f5");
                }
                layer81.draw();
            });
            this.fitStageIntoParentContainer();
            text81.on("click", this.onStart);
            text81.on("tap", this.onStart);
        }
    },
    computed: {
        currentQuestionAnswers() {
            if (!this.serverAnswers) {
                return null;
            }

            return this.serverAnswers.find(x => x.question_index == "81");
        },
        correct() {
            if (!this.serverAnswers) {
                return null;
            }

            try {
                if (this.currentQuestionAnswers.answer[0].result) {
                    return 1;
                } else {
                    return 0;
                }
            } catch (error) {
                return 0;
            }
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
