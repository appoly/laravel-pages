<template>
    <div class="wysiwyg-editor">
        <Modal ref="ytmodal" @onConfirm="addCommand" />
        <input type="hidden" :name="name" :id="name" v-model="htmlContent">
        <editor-menu-bar :editor="editor" v-slot="{ commands, isActive }">
            <div class="menubar">
                <a href="javascript://"
                        class="menubar__button"
                        :class="{ 'is-active': isActive.bold() }"
                        @click="commands.bold">
                    <img src="/vendor/appoly/laravel-pages/img/wysiwyg/bold.svg">
                </a>
                <a href="javascript://"
                        class="menubar__button"
                        :class="{ 'is-active': isActive.italic() }"
                        @click="commands.italic">
                    <img src="/vendor/appoly/laravel-pages/img/wysiwyg/italic.svg">
                </a>
                <a href="javascript://"
                        class="menubar__button"
                        :class="{ 'is-active': isActive.strike() }"
                        @click="commands.strike">
                    <img src="/vendor/appoly/laravel-pages/img/wysiwyg/strike.svg">
                </a>
                <a href="javascript://"
                        class="menubar__button"
                        :class="{ 'is-active': isActive.underline() }"
                        @click="commands.underline">
                    <img src="/vendor/appoly/laravel-pages/img/wysiwyg/underline.svg">
                </a>
                <a href="javascript://"
                        class="menubar__button"
                        :class="{ 'is-active': isActive.code() }"
                        @click="commands.code">
                    <img src="/vendor/appoly/laravel-pages/img/wysiwyg/code.svg">
                </a>
                <a href="javascript://"
                        class="menubar__button"
                        :class="{ 'is-active': isActive.paragraph() }"
                        @click="commands.paragraph">
                    <img src="/vendor/appoly/laravel-pages/img/wysiwyg/paragraph.svg">
                </a>
                <a href="javascript://"
                        class="menubar__button"
                        :class="{ 'is-active': isActive.heading({ level: 1 }) }"
                        @click="commands.heading({ level: 1 })">
                    H1
                </a>
                <a href="javascript://"
                        class="menubar__button"
                        :class="{ 'is-active': isActive.heading({ level: 2 }) }"
                        @click="commands.heading({ level: 2 })">
                    H2
                </a>
                <a href="javascript://"
                        class="menubar__button"
                        :class="{ 'is-active': isActive.heading({ level: 3 }) }"
                        @click="commands.heading({ level: 3 })">
                    H3
                </a>
                <a href="javascript://"
                        class="menubar__button"
                        :class="{ 'is-active': isActive.bullet_list() }"
                        @click="commands.bullet_list">
                    <img src="/vendor/appoly/laravel-pages/img/wysiwyg/ul.svg">
                </a>
                <a href="javascript://"
                        class="menubar__button"
                        :class="{ 'is-active': isActive.ordered_list() }"
                        @click="commands.ordered_list">
                    <img src="/vendor/appoly/laravel-pages/img/wysiwyg/ol.svg">
                </a>
                <a href="javascript://"
                        class="menubar__button"
                        :class="{ 'is-active': isActive.blockquote() }"
                        @click="commands.blockquote">
                    <img src="/vendor/appoly/laravel-pages/img/wysiwyg/quote.svg">
                </a>
                <a href="javascript://"
                        class="menubar__button"
                        :class="{ 'is-active': isActive.code_block() }"
                        @click="commands.code_block">
                    <img src="/vendor/appoly/laravel-pages/img/wysiwyg/code.svg">
                </a>
                <a href="javascript://"
                        class="menubar__button"
                        @click="commands.horizontal_rule">
                    <img src="/vendor/appoly/laravel-pages/img/wysiwyg/hr.svg">
                </a>
                <a href="javascript://"
                        class="menubar__button"
                        @click="commands.undo">
                    <img src="/vendor/appoly/laravel-pages/img/wysiwyg/undo.svg">
                </a>
                <a href="javascript://"
                        class="menubar__button"
                        @click="commands.redo">
                    <img src="/vendor/appoly/laravel-pages/img/wysiwyg/redo.svg">
                </a>
                <a href="javascript://"
                        class="menubar__button"
                        @click="openModal(commands.image);">
                    <img src="/vendor/appoly/laravel-pages/img/wysiwyg/image.svg">
                </a>
            </div>
        </editor-menu-bar>
        <editor-content class="editor__content" :editor="editor"/>
    </div>
</template>
<script>
    import {Editor, EditorContent, EditorMenuBar} from 'tiptap'
    import Modal from "./ImageUpload";
    import {
        Blockquote,
        Bold,
        BulletList,
        Code,
        CodeBlock,
        HardBreak,
        Heading,
        History,
        HorizontalRule,
        Italic,
        Link,
        ListItem,
        OrderedList,
        Strike,
        TodoItem,
        TodoList,
        Underline,
        Image,
    } from 'tiptap-extensions'
    export default {
        components: {
            EditorContent,
            EditorMenuBar,
            Modal
        },
        watch: {
            body: function(newVal, oldVal) {
                this.editor.setContent(this.body);
                this.htmlContent = this.body;
            },
        },
        mounted() {
        },
        data() {
            return {
                editor: new Editor({
                    extensions: [
                        new Blockquote(),
                        new BulletList(),
                        new CodeBlock(),
                        new HardBreak(),
                        new Heading({levels: [1, 2, 3]}),
                        new HorizontalRule(),
                        new ListItem(),
                        new OrderedList(),
                        new TodoItem(),
                        new TodoList(),
                        new Link(),
                        new Bold(),
                        new Code(),
                        new Italic(),
                        new Strike(),
                        new Underline(),
                        new History(),
                        new Image(),
                    ],
                    content: '',
                    onUpdate: ({ getHTML }) => {
                        this.htmlContent = getHTML();
                    },
                }),
                htmlContent: ''
            }
        },
        beforeDestroy() {
            this.editor.destroy()
        },
        props: [
            'body',
            'name',
        ],
        methods:{
            openModal(command) {
                this.$refs.ytmodal.showModal(command);
            },
            addCommand(data) {
                if (data.command !== null) {
                    data.command(data.data);
                }
            },
            setContent() {
                this.editor.setContent(this.content);
            }
        }
    }
</script>
