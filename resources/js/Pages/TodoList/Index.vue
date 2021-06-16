<template>
  <app-layout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Todo List
      </h2>
    </template>

    <div class="flex flex-col md:w-3/5 w-full border-solid rounded-2xl mx-auto shadow-xl m-10 bg-white">
      <div class="mx-auto py-6 text-4xl divide-y-2">
        Todo List
      </div>

      <show :todo="todo" v-for="todo in Todos" />

      <div class="flex flex-row py-5">
        <input type="text" v-model="createTodoForm.description" class="flex-grow w-4/5 rounded-lg h-10 ml-6 mr-2 shadow-inner border-none focus:ring-gray-300">
        <button class="flex-grow-0 rounded-lg h-10 w-14 mx-2 bg-green-500 text-white text-xl hover:bg-green-200 shadow-lg" @click="createTodo">+</button>
      </div>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from "../../Layouts/AppLayout"
import Show from "./Show"

export default {
  name: "TodoList",
  props: ['Todos'],
  components: {
    AppLayout,
    Show
  },
  data() {
    return {
      createTodoForm: this.$inertia.form({
        is_doned: false,
        description: "",
      })
    }
  },
  methods: {
      createTodo() {
          this.createTodoForm.post(route('todolist.store'), {
            preserveScroll: true,
            onSuccess: () => {
              this.createTodoForm.description = null;
            }
          });
      }
  }
}


</script>

<style scoped>

</style>