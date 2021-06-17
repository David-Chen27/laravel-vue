<template>
  <div class="mx-auto w-full flex flex-row my-2">
    <div class="flex-grow">
      <input type="checkbox" class="ml-3.5 mr-2 mb-2 shadow-2xl rounded-full w-6 h-6 focus:ring-0 hover:border-blue-400 border-gray-100" :checked="todo.is_doned" @change="updateTodo($event)"><span class="text-2xl" :class="{'line-through': todo.is_doned}"> {{todo.description}} </span>
    </div>
    <div class="flex-grow-0 mx-4">
      <transition>
        <button class="h-8 w-12 rounded-xl text-white text-2xl bg-red-400 hover:bg-red-200 shadow-lg" @click="deleteTodo">-</button>
      </transition>
    </div>
  </div>
</template>

<script>
export default {
  name: "DeleteTodoForm",
  props: ['todo'],
  data() {
    return {
      deleteTodoForm: this.$inertia.form(),
      updateTodoForm: this.$inertia.form({
        is_doned: null
      }),
    }
  },
  methods: {
    deleteTodo() {
      this.deleteTodoForm.delete(route('todolist.destroy', this.todo.id), {
        preserveScroll: true
      })
    },
    updateTodo(event) {
      this.updateTodoForm.is_doned = event.target.checked
      this.updateTodoForm.put(route('todolist.update', this.todo.id),  {
        preserveScroll: true
      })
    }
  }
}
</script>

<style scoped>

</style>