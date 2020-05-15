<template>
    <div class="table-responsive">
        <table class="table mt-3">
            <thead>
            <tr>
                <th scope="col">Task</th>
                <th scope="col">Priority</th>
                <th scope="col">Edit</th>
            </tr>
            </thead>
            <draggable :list="taskList" :options="{animation:200}" :element="'tbody'" @change="updateTaskPriority">
                <tr v-for="task in taskList" :key="task.id + task.name" class="dragItem">
                    <td>
                        <form class="d-flex align-content-center" :action="'/tasks/' + task.id" method="POST">
                            <input type="hidden" name="_method" value="PATCH">
                            <input type="hidden" name="_token" :value="csrf">

                            <input type="text" onChange="this.form.submit()" class="form-control w-50 mr-2" id="name"
                                   name="name"
                                   :value="task.name">
                            <div class="form-group d-flex align-content-center w-50">
                                <select name="project" onChange="this.form.submit()" class="form-control mr-2"
                                        id="project">
                                    <option value="">Select a Project</option>
                                    <option v-for="project in projects" :key="project.id"
                                            :selected="task.project_id == project.id" :value="project.id">{{
                                        project.name }}
                                    </option>
                                </select>
                                <div class="custom-control custom-switch mr-2">
                                    <input type="checkbox" name="completed" onChange="this.form.submit()" value="1"
                                           :checked="task.completed == '1'" class="custom-control-input"
                                           :id="task.id + 'completed'">
                                    <label class="custom-control-label" :for="task.id + 'completed'">Task
                                        Finished?</label>
                                </div>
                            </div>

                        </form>
                    </td>
                    <td>
                        <div>{{ task.priority }}</div>
                    </td>
                    <td>
                        <a :href="'/tasks/' + task.id  + '/edit'" class="far fa-edit"></a>
                    </td>
                </tr>
            </draggable>
        </table>
    </div>
</template>

<script>
    import draggable from 'vuedraggable'

    export default {
        props: ['tasks', 'projects'],

        data() {
            return {
                taskList: this.tasks,
                csrf: document.head.querySelector('meta[name="csrf-token"]').content,
            };
        },
        methods: {
          updateTaskPriority(){
              this.taskList.map((task, index) => {
                  task.priority = index +1;
              });

              axios.patch('/priority/update', {
                  taskList: this.taskList
              });
          }
        },
        components: {
            draggable,
        },
    }
</script>

<style>
    tr{
        cursor: pointer;
    }
</style>
