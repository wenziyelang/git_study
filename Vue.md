# 1、vsCode
## 1.Live Server
+ 安装：插件->live server->安装
+ 启动命令：Alt+L Alt+O
+ 停止命令：Alt+L Alt+C
## 2.vsCode命令
+ 命令面板：ctrl +shift + P

# 2、vue2.0

## 1.挂载方式：

+ 挂载方式el：

  ```
   <script type="text/javascript" >
          new Vue({
              el:'#root',
              data:{
                  name:'sddf',
                  age:18,
                  url:'https://www.bailitop.com'
              }
          })
     </script>
  ```

+ 挂载方式：$mount

  ```
  new Vue({}).$mount('#app')
  ```

## 2.赋值

+ {{}} 

  ```
  <h1>{{name.toUpperCase()}}</h1>
  <h1>{{age}}</h1>
      <script type="text/javascript" >
          new Vue({
              el:'#root',
              data:{
                  name:'sddf',
                  age:18,
                  url:'https://www.bailitop.com'
              }
          })
      </script>
  ```

+ v-bind、:

  ```
  <a :href="url">官网</a><br /><br />
  <a v-bind:href="url">官网</a><br /><br />
  ```

## 3.绑定

+ 单项绑定：

  ```
   <input type="text" v-bind:value="name">
   <script type="text/javascript" >
          new Vue({
              el:'#root',
              data:{
                  name:'sddf',
                  age:18,
                  url:'https://www.bailitop.com'
              }
          })
      </script>
  ```

+ 双向绑定：

  ```
   <input type="text" v-model:value="name">
     <script type="text/javascript" >
          new Vue({
              el:'#root',
              data:{
                  name:'sddf',
                  age:18,
                  url:'https://www.bailitop.com'
              }
          })
      </script>
  ```

  