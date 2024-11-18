<script setup>
import TextInput from '@/Components/TextInput.vue';
import LoginLayout from '@/Layouts/LoginLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { reactive } from 'vue';
import { router, Head, Link, useForm } from '@inertiajs/vue3';
defineOptions({ layout: LoginLayout });
const form = useForm({
    username: '',
    password: '',
});

const handleLogin = () => {
    console.log('login', form.username, form.password, form);
};
</script>

<template>
    <div class="login flex flex-col-reverse xl:h-screen xl:flex-row">
        <div
            class="login__banner xl:w[620px] sm:w-100 login__background xl:h-screen relative"
        >
            <PrimaryButton
                type="info"
                classes="h-[54px] w-[240px] rounded-xxl bg-transparent hover:opacity-70 hover:bg-white absolute left-1/2 bottom-20 -translate-x-1/2 -translate-y-1/2  border-white"
                @click="handleLogin"
            >
                <div class="flex justify-center">
                    <span> 新規登録はこちら </span>
                    <img src="@assets/images/common/icon-signup.svg" alt="icon-signup" class="pl-2" />
                </div>
            </PrimaryButton>
        </div>

        <div
            class="login__form sm:w-100 flex flex-col py-[30px] xl:h-screen xl:w-[calc(100vw-620px)] xl:py-0"
        >
            <div class="w-100 xl:w-[400px]">
                <h1
                    class="text-center font-semibold text-primary sm:text-h5 xl:text-h1"
                >
                    ログイン
                </h1>
                <div
                    class="w-100 h-100 mt-[17px] grid grid-cols-1 gap-y-[18px] xl:mt-[45px] xl:gap-y-[40px]"
                >
                    <div class="grid grid-cols-1 gap-y-[18px] xl:gap-y-[23px]">
                        <div>
                            <TextInput
                                label="ログインID"
                                type="text"
                                v-model="form.username"
                                placeholder="ログインID"
                            ></TextInput>
                        </div>
                        <div>
                            <TextInput
                                label="パスワード"
                                type="password"
                                v-model="form.password"
                                placeholder="パスワード"
                            ></TextInput>
                        </div>
                    </div>

                    <div>
                        <PrimaryButton
                            type="success"
                            radius="xl"
                            classes="h-[64px] rounded-xxl"
                            @click="handleLogin"
                            >ログイン</PrimaryButton
                        >
                    </div>
                    <Link
                        href=""
                        class="text-center font-bold text-primary underline"
                    >
                        パスワードを忘れた方はこちら
                    </Link>
                </div>
            </div>
        </div>
    </div>
</template>
<style lang="scss" scoped>
.login {
    .login__banner {
        height: 100vh;
        // flex: 0 0 620px;
    }
    .login__form {
        // width: calc(100vw - 620px);
        display: flex;
        align-items: center;
        justify-content: center;
    }
}
</style>
