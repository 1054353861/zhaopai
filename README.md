# 接口文档


## 一、登录接口

### 1.用户登录

#### Request
```
POST /Api/Login/login
```

#### Parameters：
- `account` 账号(手机号)
- `password` 密码

#### Response
```json
{
   "status": "0",
   "msg": "登录成功",
   "data":
   {
       "id": "1",
       "account": "13111111111",
       "nickname": "吴智勇",
       "city_id": "1",
       "title": "上海市",
       "head_img": "http://zhaopai.jsonlin.cn/App/Uploads/20150215/54dffe04ef775.jpg",
       "sex": "0",
       "background_img": "http://zhaopai.jsonlin.cn/App/Uploads/20150226/54eed3fb29f14.jpg",
       "integral": "0",
       "interest": "22",
       "name": "吴志勇2",
       "user_age": "26",
       "address": "浦东新区",
       "address_phone": "1231231",
       "last_login_time": "2015-02-26 17:02:50",
       "login_count": "224",
       "create_time": "2015-02-15 09:27:02"
   },
   "num": "17",
   "token": "DmMAaFQ3DTdRMAJkVDVQbAkxBDZYYgNiBTVbYVJgUTRbNgJlA3wIMVw+AnhUNgU+"
}
```

### 2.注册用户接口

#### Request
```
  POST /Api/Login/register
```

#### Parameters：
- `nickname` 昵称
- `password` 密码
- `password_confirm` 重复密码
- `user_sex` 用户性别
- `cell_phone` 手机号
- `user_city` 城市ID
- `user_avater` 用户头像
- `head_img` 黑长直专用头像接口

#### Response
```json
{
   "status": "0",
   "msg": "注册成功",
   "data":
   {
       "token": "DmNbOVQ8C+YH6gbxALVU/AayDTRcZVc3BzdQZVN+Wz4BbwF+BmQLMA==",
       "user_info":
       {
           "id": "10",
           "account": "13472798999",
           "nickname": "你好",
           "password": "e10adc3949ba59abbe56e057f20f883e",
           "phone": "13472798999",
           "city_id": "1",
           "head_img": "",
           "sex": "1",
           "background_img": "",
           "integral": "0",
           "last_login_time": "1422850289",
           "last_login_ip": "0.0.0.0",
           "login_count": "0",
           "create_time": "1422850289",
           "update_time": "1422850289",
           "type": "1",
           "status": "0",
           "is_del": "0",
           "title": "上海市"
       }
   },
   "num": "2"
}
```


### 3.手机号发送接口

#### Request
```
POST /Api/SendMsg/user_account_register
```

#### Parameters：
- `telephone` 账号(手机号)

#### Response
```json
{
  "status": "0",
  "msg": "发送成功",
  "data":
  [
  ],
  "num": "0"
}
```

### 4.验证手机号验证码端口

#### Request
```
POST /Api/Login/check_register_phone_msg
```

#### Parameters：
- `telephone` 账号(手机号)
- `verify` 收到的手机验证码


#### Response
```json
{
  "status": "0",
  "msg": "验证成功",
  "data":
  [
  ],
  "num": "0"
}
```

### 5.用户登录

#### Request
```
POST /Api/Login/regeister_login_order
```

#### Parameters：
- `order_id` 第三方ID
- `image` 图片路径
- `nickname` 昵称
- `sex` 性别

#### Response
```json
{
   "status": "0",
   "msg": "登录成功",
   "data":
   {
       "id": "1",
       "account": "13111111111",
       "nickname": "吴智勇",
       "city_id": "1",
       "title": "上海市",
       "head_img": "http://zhaopai.jsonlin.cn/App/Uploads/20150215/54dffe04ef775.jpg",
       "sex": "0",
       "background_img": "http://zhaopai.jsonlin.cn/App/Uploads/20150226/54eed3fb29f14.jpg",
       "integral": "0",
       "interest": "22",
       "name": "吴志勇2",
       "user_age": "26",
       "address": "浦东新区",
       "address_phone": "1231231",
       "last_login_time": "2015-02-26 17:02:50",
       "login_count": "224",
       "create_time": "2015-02-15 09:27:02"
   },
   "num": "17",
   "token": "DmMAaFQ3DTdRMAJkVDVQbAkxBDZYYgNiBTVbYVJgUTRbNgJlA3wIMVw+AnhUNgU+"
}
```

### 6.用户修改密码

#### Request
```
POST /Api/Login/set_new_password
```

#### Parameters：
- `cellphone` 用户手机号
- `password` 密码
- `new_password` 第二次密码

#### Response
```json
{
   "status": "0",
   "msg": "修改成功",
   "data": ""
   "num": "1"
}
```



### 7.找回密码短信发送接口

#### Request
```
POST /Api/SendMsg/restore_the_password
```

#### Parameters：
- `telephone` 账号(手机号)

#### Response
```json
{
  "status": "0",
  "msg": "发送成功",
  "data":
  [
  ],
  "num": "0"
}
```

### 8.验证找回密码短信接口

#### Request
```
POST /Api/Login/check_restore_the_password
```

#### Parameters：
- `telephone` 账号(手机号)
- `verify` 收到的手机验证码


#### Response
```json
{
  "status": "0",
  "msg": "验证成功",
  "data":
  [
  ],
  "num": "0"
}
```

### 9.通过 token 获取用户登录信息

#### Request
```
POST /Api/User/get_user_login_info_for_token
```

#### Parameters：
- `token` 通过登录接口获取

#### Response
与 /Api/Login/login 接口返回相同


### 10.通过 token 获取用户登录信息

#### Request
```
POST /Api/User/get_user_login_info_for_token
```

#### Parameters：
- `token` 通过登录接口获取

#### Response
与 /Api/Login/login 接口返回相同

## 二、好友接口

### 1.申请好友

#### Request
```
POST /Api/Friend/friend_add
```

#### Parameters：
- `token` 用户登录后拿去的用户标示
- `friend_id` 好友ID

#### Response
```json
{
   "status": "0",
   "msg": "",
   "data": "",
   "num": "1"
}
```


### 2.好友列表

#### Request
```
POST /Api/Friend/friend_list
```

#### Parameters：
- `token` 用户登录后拿去的用户标示

#### Response
```json
{
   "status": "0",
   "msg": "",
   "data":
   {
       "info":
       [
           {
               "id": "4",
               "nickname": "朱十2",
               "head_img": "",
               "city_id": "1",
               "title": "上海市"
           },
           {
               "id": "8",
               "nickname": "朱十5",
               "head_img": "",
               "city_id": "0",
               "title": ""
           }
       ],
       "no_friends": "0"
   },
   "num": "2"
}
```


### 3.新的拍友

#### Request
```
POST /Api/Friend/friend_new_list
```

#### Parameters：
- `token` 用户登录后拿去的用户标示

#### Response
```json
{
   "status": "0",
   "msg": "",
   "data":
   [
       {
           "id": "8",
           "nickname": "朱十5",
           "head_img": "",
           "city_id": "0",
           "title": ""
       }
   ],
   "num": "1"
}
```


### 4.同意拍友申请

#### Request
```
POST /Api/Friend/friend_agree
```

#### Parameters：
- `token` 用户登录后拿去的用户标示
- `friend_id` 好友ID

#### Response
```json
{
   "status": "0",
   "msg": "",
   "data": "",
   "num": "1"
}
```


### 5.拍友搜索

#### Request
```
POST /Api/Friend/friend_search
```

#### Parameters：
- `token` 用户登录后拿去的用户标示
- `user_name` 好友名

#### Response
```json
{
   "status": "0",
   "msg": "",
   "data":
   [
       {
           "id": "4",
           "nickname": "朱十2",
           "head_img": "",
           "title": "上海市"
       },
       {
           "id": "5",
           "nickname": "朱十3",
           "head_img": "",
           "title": "上海市"
       },
       {
           "id": "7",
           "nickname": "朱十4",
           "head_img": "",
           "title": ""
       },
       {
           "id": "8",
           "nickname": "朱十5",
           "head_img": "",
           "title": ""
       }
   ],
   "num": "4"
}
```


### 6.拍友删除

#### Request
```
POST /Api/Friend/friend_delete
```

#### Parameters：
- `token` 用户登录后拿去的用户标示
- `friend_id` 好友id

#### Response
```json
{
   "status": "0",
   "msg": "删除好友成功",
   "data": "",
   "num": "1"
}
```


## 三、首页接口

### 1.首页

#### Request
```
POST /Api/Home/home_data
```

#### Parameters：
- `token` 用户登录后拿去的用户标示
- `city` 城市ID 可有可不有，有就搜索该城市下的文章
- `type` 1-是根据时间 2-根据最近
- `p` 第几页
- `longitude` 精度
- `latitude` 纬度
- `count` 数量

#### Response
```json
{
   "status": "0",
   "msg": "获取成功",
   "data":
   {
       "all_count": "10",
       "info":
       [
           {
               "user_info":
               {
                   "id": "26",
                   "account": "13472798110",
                   "nickname": "沧桑啊～",
                   "password": "e10adc3949ba59abbe56e057f20f883e",
                   "phone": "13472798110",
                   "city_id": "1",
                   "head_img": "http://zhaopai.jsonlin.cn/App/Uploads/20150302/54f405c08fdad.jpg",
                   "age": "0",
                   "sex": "0",
                   "background_img": "center_bg.png",
                   "integral": "130",
                   "interest": "",
                   "name": "",
                   "address": "",
                   "address_phone": "",
                   "last_login_time": "1425281958",
                   "last_login_ip": "222.69.135.221",
                   "login_count": "11",
                   "create_time": "1425278401",
                   "update_time": "1425278401",
                   "type": "1",
                   "status": "0",
                   "is_del": "0",
                   "title": "上海市"
               },
               "photo_info":
               {
                   "id": "42",
                   "user_id": "26",
                   "content": "测试",
                   "city_id": "1",
                   "article_img": "http://zhaopai.jsonlin.cn/App/Uploads/20150302/54f4066ecc88f.jpg",
                   "create_time": "1425278574",
                   "support": "0",
                   "nonsupport": "0",
                   "recommend": "0",
                   "longitude": "121.20127700000000000",
                   "latitude": "31.20056500000000000",
                   "is_report": "0",
                   "distance": "0",
                   "photo_time": "2015-03-02 14:42:54",
                   "tag_info":
                   [
                       {
                           "id": "2",
                           "label_name": "文艺"
                       },
                       {
                           "id": "1",
                           "label_name": "文明"
                       }
                   ],
                   "like_info":
                   {
                       "like_num": "0",
                       "like_list": ""
                   },
                   "comment_num": "0"
               }
           },
           {
               "user_info":
               {
                   "id": "1",
                   "account": "13111111111",
                   "nickname": "吴智勇",
                   "password": "e10adc3949ba59abbe56e057f20f883e",
                   "phone": "13111111111",
                   "city_id": "1",
                   "head_img": "http://zhaopai.jsonlin.cn/App/Uploads/20150215/54dffe04ef775.jpg",
                   "age": "26",
                   "sex": "1",
                   "background_img": "20150226/54eed3fb29f14.jpg",
                   "integral": "830",
                   "interest": "22",
                   "name": "吴志勇2",
                   "address": "浦东新区",
                   "address_phone": "1231231",
                   "last_login_time": "1425282048",
                   "last_login_ip": "112.65.191.228",
                   "login_count": "293",
                   "create_time": "1423963622",
                   "update_time": "1423963622",
                   "type": "1",
                   "status": "0",
                   "is_del": "0",
                   "title": "上海市"
               },
               "photo_info":
               {
                   "id": "39",
                   "user_id": "1",
                   "content": "额",
                   "city_id": "1",
                   "article_img": "http://zhaopai.jsonlin.cn/App/Uploads/20150302/54f3f398c31a8.mp4",
                   "create_time": "1425273755",
                   "support": "1",
                   "nonsupport": "0",
                   "recommend": "0",
                   "longitude": "121.20116700000000000",
                   "latitude": "31.20059600000000000",
                   "is_report": "0",
                   "distance": "0.01",
                   "photo_time": "2015-03-02 13:22:35",
                   "tag_info":
                   [
                       {
                           "id": "8",
                           "label_name": "脏乱差"
                       },
                       {
                           "id": "6",
                           "label_name": "变态"
                       }
                   ],
                   "like_info":
                   {
                       "like_num": "0",
                       "like_list": ""
                   },
                   "comment_num": "2"
               }
           },
           {
               "user_info":
               {
                   "id": "4",
                   "account": "13766666666",
                   "nickname": "Kidd",
                   "password": "7fa8282ad93047a4d6fe6111c93b308a",
                   "phone": "13766666666",
                   "city_id": "2",
                   "head_img": "http://zhaopai.jsonlin.cn/App/Uploads/20150215/54e045e4e98b3.jpg",
                   "age": "0",
                   "sex": "0",
                   "background_img": "20150215/54e0720a84313.jpg",
                   "integral": "80",
                   "interest": "",
                   "name": "",
                   "address": "",
                   "address_phone": "",
                   "last_login_time": "1425275197",
                   "last_login_ip": "223.104.5.151",
                   "login_count": "24",
                   "create_time": "1423984100",
                   "update_time": "1423984100",
                   "type": "1",
                   "status": "0",
                   "is_del": "0",
                   "title": "北京市"
               },
               "photo_info":
               {
                   "id": "26",
                   "user_id": "4",
                   "content": "海景海景",
                   "city_id": "1",
                   "article_img": "http://zhaopai.jsonlin.cn/App/Uploads/20150227/54eff69784f74.jpg",
                   "create_time": "1425012375",
                   "support": "1",
                   "nonsupport": "1",
                   "recommend": "0",
                   "longitude": "121.37600000000000000",
                   "latitude": "31.26037000000000000",
                   "is_report": "0",
                   "distance": "17.91",
                   "photo_time": "2015-02-27 12:46:15",
                   "tag_info": "",
                   "like_info":
                   {
                       "like_num": "0",
                       "like_list": ""
                   },
                   "comment_num": "0"
               }
           },
           {
               "user_info":
               {
                   "id": "3",
                   "account": "18616743312",
                   "nickname": "wish",
                   "password": "e10adc3949ba59abbe56e057f20f883e",
                   "phone": "18616743312",
                   "city_id": "2",
                   "head_img": "http://zhaopai.jsonlin.cn/App/Uploads/20150302/54f3c8a08ce66.jpg",
                   "age": "0",
                   "sex": "0",
                   "background_img": "20150302/54f3c8c4b3d7b.jpg",
                   "integral": "580",
                   "interest": "lol",
                   "name": "wish",
                   "address": "金沙江西路",
                   "address_phone": "18616743312",
                   "last_login_time": "1425283203",
                   "last_login_ip": "116.226.30.205",
                   "login_count": "113",
                   "create_time": "1423965176",
                   "update_time": "1423965176",
                   "type": "1",
                   "status": "0",
                   "is_del": "0",
                   "title": "北京市"
               },
               "photo_info":
               {
                   "id": "22",
                   "user_id": "3",
                   "content": "哈哈哈，上班第一天╮(╯▽╰)╭",
                   "city_id": "1",
                   "article_img": "http://zhaopai.jsonlin.cn/App/Uploads/20150225/54ed5d83bd9f1.jpg",
                   "create_time": "1424842115",
                   "support": "1",
                   "nonsupport": "0",
                   "recommend": "0",
                   "longitude": "121.42804400000000000",
                   "latitude": "31.26597000000000000",
                   "is_report": "0",
                   "distance": "22.78",
                   "photo_time": "2015-02-25 13:28:35",
                   "tag_info": "",
                   "like_info":
                   {
                       "like_num": "1",
                       "like_list":
                       [
                           {
                               "id": "3",
                               "head_img": "http://zhaopai.jsonlin.cn/App/Uploads/20150302/54f3c8a08ce66.jpg"
                           }
                       ]
                   },
                   "comment_num": "1"
               }
           },
           {
               "user_info":
               {
                   "id": "1",
                   "account": "13111111111",
                   "nickname": "吴智勇",
                   "password": "e10adc3949ba59abbe56e057f20f883e",
                   "phone": "13111111111",
                   "city_id": "1",
                   "head_img": "http://zhaopai.jsonlin.cn/App/Uploads/20150215/54dffe04ef775.jpg",
                   "age": "26",
                   "sex": "1",
                   "background_img": "20150226/54eed3fb29f14.jpg",
                   "integral": "830",
                   "interest": "22",
                   "name": "吴志勇2",
                   "address": "浦东新区",
                   "address_phone": "1231231",
                   "last_login_time": "1425282048",
                   "last_login_ip": "112.65.191.228",
                   "login_count": "293",
                   "create_time": "1423963622",
                   "update_time": "1423963622",
                   "type": "1",
                   "status": "0",
                   "is_del": "0",
                   "title": "上海市"
               },
               "photo_info":
               {
                   "id": "21",
                   "user_id": "1",
                   "content": "猜下吧",
                   "city_id": "1",
                   "article_img": "http://zhaopai.jsonlin.cn/App/Uploads/20150216/54e1dfcaeb64f.jpg",
                   "create_time": "1424089034",
                   "support": "1",
                   "nonsupport": "1",
                   "recommend": "0",
                   "longitude": "121.44910000000000000",
                   "latitude": "31.19175000000000000",
                   "is_report": "0",
                   "distance": "23.62",
                   "photo_time": "2015-02-16 20:17:14",
                   "tag_info": "",
                   "like_info":
                   {
                       "like_num": "2",
                       "like_list":
                       [
                           {
                               "id": "3",
                               "head_img": "http://zhaopai.jsonlin.cn/App/Uploads/20150302/54f3c8a08ce66.jpg"
                           },
                           {
                               "id": "1",
                               "head_img": "http://zhaopai.jsonlin.cn/App/Uploads/20150215/54dffe04ef775.jpg"
                           }
                       ]
                   },
                   "comment_num": "12"
               }
           },
           {
               "user_info":
               {
                   "id": "1",
                   "account": "13111111111",
                   "nickname": "吴智勇",
                   "password": "e10adc3949ba59abbe56e057f20f883e",
                   "phone": "13111111111",
                   "city_id": "1",
                   "head_img": "http://zhaopai.jsonlin.cn/App/Uploads/20150215/54dffe04ef775.jpg",
                   "age": "26",
                   "sex": "1",
                   "background_img": "20150226/54eed3fb29f14.jpg",
                   "integral": "830",
                   "interest": "22",
                   "name": "吴志勇2",
                   "address": "浦东新区",
                   "address_phone": "1231231",
                   "last_login_time": "1425282048",
                   "last_login_ip": "112.65.191.228",
                   "login_count": "293",
                   "create_time": "1423963622",
                   "update_time": "1423963622",
                   "type": "1",
                   "status": "0",
                   "is_del": "0",
                   "title": "上海市"
               },
               "photo_info":
               {
                   "id": "19",
                   "user_id": "1",
                   "content": "晚饭",
                   "city_id": "1",
                   "article_img": "http://zhaopai.jsonlin.cn/App/Uploads/20150216/54e1df398788c.jpg",
                   "create_time": "1424088889",
                   "support": "1",
                   "nonsupport": "0",
                   "recommend": "0",
                   "longitude": "121.44940000000000000",
                   "latitude": "31.19174000000000000",
                   "is_report": "0",
                   "distance": "23.65",
                   "photo_time": "2015-02-16 20:14:49",
                   "tag_info": "",
                   "like_info":
                   {
                       "like_num": "0",
                       "like_list": ""
                   },
                   "comment_num": "0"
               }
           },
           {
               "user_info":
               {
                   "id": "1",
                   "account": "13111111111",
                   "nickname": "吴智勇",
                   "password": "e10adc3949ba59abbe56e057f20f883e",
                   "phone": "13111111111",
                   "city_id": "1",
                   "head_img": "http://zhaopai.jsonlin.cn/App/Uploads/20150215/54dffe04ef775.jpg",
                   "age": "26",
                   "sex": "1",
                   "background_img": "20150226/54eed3fb29f14.jpg",
                   "integral": "830",
                   "interest": "22",
                   "name": "吴志勇2",
                   "address": "浦东新区",
                   "address_phone": "1231231",
                   "last_login_time": "1425282048",
                   "last_login_ip": "112.65.191.228",
                   "login_count": "293",
                   "create_time": "1423963622",
                   "update_time": "1423963622",
                   "type": "1",
                   "status": "0",
                   "is_del": "0",
                   "title": "上海市"
               },
               "photo_info":
               {
                   "id": "20",
                   "user_id": "1",
                   "content": "晚饭",
                   "city_id": "1",
                   "article_img": "http://zhaopai.jsonlin.cn/App/Uploads/20150216/54e1df3a15a80.jpg",
                   "create_time": "1424088890",
                   "support": "0",
                   "nonsupport": "1",
                   "recommend": "0",
                   "longitude": "121.44940000000000000",
                   "latitude": "31.19174000000000000",
                   "is_report": "0",
                   "distance": "23.65",
                   "photo_time": "2015-02-16 20:14:50",
                   "tag_info": "",
                   "like_info":
                   {
                       "like_num": "2",
                       "like_list":
                       [
                           {
                               "id": "3",
                               "head_img": "http://zhaopai.jsonlin.cn/App/Uploads/20150302/54f3c8a08ce66.jpg"
                           },
                           {
                               "id": "1",
                               "head_img": "http://zhaopai.jsonlin.cn/App/Uploads/20150215/54dffe04ef775.jpg"
                           }
                       ]
                   },
                   "comment_num": "1"
               }
           },
           {
               "user_info":
               {
                   "id": "1",
                   "account": "13111111111",
                   "nickname": "吴智勇",
                   "password": "e10adc3949ba59abbe56e057f20f883e",
                   "phone": "13111111111",
                   "city_id": "1",
                   "head_img": "http://zhaopai.jsonlin.cn/App/Uploads/20150215/54dffe04ef775.jpg",
                   "age": "26",
                   "sex": "1",
                   "background_img": "20150226/54eed3fb29f14.jpg",
                   "integral": "830",
                   "interest": "22",
                   "name": "吴志勇2",
                   "address": "浦东新区",
                   "address_phone": "1231231",
                   "last_login_time": "1425282048",
                   "last_login_ip": "112.65.191.228",
                   "login_count": "293",
                   "create_time": "1423963622",
                   "update_time": "1423963622",
                   "type": "1",
                   "status": "0",
                   "is_del": "0",
                   "title": "上海市"
               },
               "photo_info":
               {
                   "id": "13",
                   "user_id": "1",
                   "content": "123",
                   "city_id": "1",
                   "article_img": "http://zhaopai.jsonlin.cn/App/Uploads/20150215/54e0b1171392a.jpg",
                   "create_time": "1424011543",
                   "support": "0",
                   "nonsupport": "1",
                   "recommend": "0",
                   "longitude": "121.45180000000000000",
                   "latitude": "31.18942000000000000",
                   "is_report": "0",
                   "distance": "23.89",
                   "photo_time": "2015-02-15 22:45:43",
                   "tag_info": "",
                   "like_info":
                   {
                       "like_num": "1",
                       "like_list":
                       [
                           {
                               "id": "1",
                               "head_img": "http://zhaopai.jsonlin.cn/App/Uploads/20150215/54dffe04ef775.jpg"
                           }
                       ]
                   },
                   "comment_num": "1"
               }
           },
           {
               "user_info":
               {
                   "id": "1",
                   "account": "13111111111",
                   "nickname": "吴智勇",
                   "password": "e10adc3949ba59abbe56e057f20f883e",
                   "phone": "13111111111",
                   "city_id": "1",
                   "head_img": "http://zhaopai.jsonlin.cn/App/Uploads/20150215/54dffe04ef775.jpg",
                   "age": "26",
                   "sex": "1",
                   "background_img": "20150226/54eed3fb29f14.jpg",
                   "integral": "830",
                   "interest": "22",
                   "name": "吴志勇2",
                   "address": "浦东新区",
                   "address_phone": "1231231",
                   "last_login_time": "1425282048",
                   "last_login_ip": "112.65.191.228",
                   "login_count": "293",
                   "create_time": "1423963622",
                   "update_time": "1423963622",
                   "type": "1",
                   "status": "0",
                   "is_del": "0",
                   "title": "上海市"
               },
               "photo_info":
               {
                   "id": "12",
                   "user_id": "1",
                   "content": "看下吧",
                   "city_id": "1",
                   "article_img": "http://zhaopai.jsonlin.cn/App/Uploads/20150215/54e0b0c1264fe.jpg",
                   "create_time": "1424011457",
                   "support": "1",
                   "nonsupport": "0",
                   "recommend": "0",
                   "longitude": "121.45180000000000000",
                   "latitude": "31.18940000000000000",
                   "is_report": "0",
                   "distance": "23.89",
                   "photo_time": "2015-02-15 22:44:17",
                   "tag_info": "",
                   "like_info":
                   {
                       "like_num": "1",
                       "like_list":
                       [
                           {
                               "id": "1",
                               "head_img": "http://zhaopai.jsonlin.cn/App/Uploads/20150215/54dffe04ef775.jpg"
                           }
                       ]
                   },
                   "comment_num": "1"
               }
           },
           {
               "user_info":
               {
                   "id": "4",
                   "account": "13766666666",
                   "nickname": "Kidd",
                   "password": "7fa8282ad93047a4d6fe6111c93b308a",
                   "phone": "13766666666",
                   "city_id": "2",
                   "head_img": "http://zhaopai.jsonlin.cn/App/Uploads/20150215/54e045e4e98b3.jpg",
                   "age": "0",
                   "sex": "0",
                   "background_img": "20150215/54e0720a84313.jpg",
                   "integral": "80",
                   "interest": "",
                   "name": "",
                   "address": "",
                   "address_phone": "",
                   "last_login_time": "1425275197",
                   "last_login_ip": "223.104.5.151",
                   "login_count": "24",
                   "create_time": "1423984100",
                   "update_time": "1423984100",
                   "type": "1",
                   "status": "0",
                   "is_del": "0",
                   "title": "北京市"
               },
               "photo_info":
               {
                   "id": "40",
                   "user_id": "4",
                   "content": "duang",
                   "city_id": "1",
                   "article_img": "http://zhaopai.jsonlin.cn/App/Uploads/20150302/54f3fc4eaed39.jpg",
                   "create_time": "1425275982",
                   "support": "1",
                   "nonsupport": "0",
                   "recommend": "0",
                   "longitude": "121.49030000000000000",
                   "latitude": "31.25384000000000000",
                   "is_report": "0",
                   "distance": "28.14",
                   "photo_time": "2015-03-02 13:59:42",
                   "tag_info":
                   [
                       {
                           "id": "67",
                           "label_name": "duang"
                       }
                   ],
                   "like_info":
                   {
                       "like_num": "0",
                       "like_list": ""
                   },
                   "comment_num": "1"
               }
           }
       ]
   },
   "num": "2"
}
```

### 2.广告页

#### Request
```
zhaopai.jsonlin.cn/Api/Home/home_advertment/advert_id/1
```
#### Parameters：
- `advert_id` 文章ID



## 四、赞的列表

### 1.赞的列表

#### Request
```
POST /Api/Likes/like_list
```

#### Parameters：
- `token` 用户登录后拿去的用户标示
- `article_id` 文章ID

#### Response
```json
{
   "status": "0",
   "msg": "",
   "data":
   {
       "like_num": "1",
       "like_list":
       [
           {
               "id": "11",
               "nickname": "Kidddd",
               "head_img": "http://localhost/App/Uploads/20150204/54d1bfd75abde.jpg",
               "title": "",
               "create_time": "2015-02-09 13:20:31",
               "is_friend": "1"
           }
       ]
   },
   "num": "2"
}
```


### 2.收藏文章

#### Request
```
POST /Api/Likes/like_comment
```

#### Parameters：
- `token` 用户登录后拿去的用户标示
- `article_id` 文章ID

#### Response
```json
{
   "status": "0",
   "msg": "",
   "data": "",
   "num": "1"
}
```


## 五、赞的列表

### 1.商城

#### Request
```
POST /Api/Marke/marke_list
```

#### Parameters：
- `token` 用户登录后拿去的用户标示

#### Response
```json
{
   "status": "0",
   "msg": "",
   "data":
   [
       {
           "id": "1",
           "shop_name": "节操一斤",
           "shop_content": "节操一斤",
           "shop_number": "5",
           "shop_integral": "200",
           "shop_id": "1",
           "shop_url": "http://d.hiphotos.baidu.com/super/whfpf%3D425%2C260%2C50/sign=f1717e5dd4ca7bcb7d2e946fd8345f51/024f78f0f736afc3fa4e78fbb019ebc4b64512e9.jpg"
       }
   ],
   "num": "1"
}
```


### 2.查看商品详情

#### Request
```
POST /Api/Marke/marke_detail
```

#### Parameters：
- `token` 用户登录后拿去的用户标示
- `shop_id` 商品ID

#### Response
```json
{
   "status": "0",
   "msg": "",
   "data":
   {
       "shop_name": "节操一斤",
       "shop_content": "节操一斤",
       "shop_number": "5",
       "shop_integral": "200",
       "image_list":
       [
           "http://d.hiphotos.baidu.com/super/whfpf%3D425%2C260%2C50/sign=f1717e5dd4ca7bcb7d2e946fd8345f51/024f78f0f736afc3fa4e78fbb019ebc4b64512e9.jpg",
           "http://d.hiphotos.baidu.com/super/whfpf%3D425%2C260%2C50/sign=f1717e5dd4ca7bcb7d2e946fd8345f51/024f78f0f736afc3fa4e78fbb019ebc4b64512e9.jpg",
           "http://d.hiphotos.baidu.com/super/whfpf%3D425%2C260%2C50/sign=f1717e5dd4ca7bcb7d2e946fd8345f51/024f78f0f736afc3fa4e78fbb019ebc4b64512e9.jpg"
       ]
   },
   "num": "5"
}
```


### 3.商品兑换

#### Request
```
POST /Api/Marke/market_get
```

#### Parameters：
- `token` 用户登录后拿去的用户标示
- `shop_id` 商品ID
- `name` 姓名
- `cellphone` 手机号
- `address` 地址

#### Response
```json
{
   "status": "0",
   "msg": "",
   "data": "",
   "num": "1"
}
```

## 六、动态列表

### 1.动态-动态

#### Request
```
POST /Api/News/news_active
```

#### Parameters：
- `token` 用户登录后拿去的用户标示
- `p` 第几页
- `index` 一页多少条

#### Response
```json
{
   "status": "0",
   "msg": "",
   "data":
   {
       "all_num": "2",
       "info":
       [
           {
               "user_info":
               {
                   "id": "4",
                   "nickname": "朱十2",
                   "head_img": "",
                   "title": "上海市"
               },
               "content":
               {
                   "type": "2",
                   "info":
                   {
                       "content": "文明靠大家",
                       "article_img": "www.baidu.com",
                       "like_num": "20"
                   }
               },
               "time": "2015-01-24 13:04:57"
           },
           {
               "user_info":
               {
                   "id": "4",
                   "nickname": "朱十2",
                   "head_img": "",
                   "title": "上海市"
               },
               "content":
               {
                   "type": "1",
                   "info":
                   {
                       "content": "文明靠大家",
                       "article_img": "www.baidu.com",
                       "like_num": "20"
                   }
               },
               "time": "2015-01-17 18:28:39"
           }
       ]
   },
   "num": "2"
}
```


### 2.动态-收藏

#### Request
```
POST /Api/News/news_save
```

#### Parameters：
- `token` 用户登录后拿去的用户标示
- `p` 第几页
- `index` 一页多少条

#### Response
```json
{
   "status": "0",
   "msg": "",
   "data":
   {
       "info":
       [
           {
               "user_info":
               {
                   "id": "3",
                   "nickname": "zhuchencong",
                   "head_img": "",
                   "title": "上海市"
               },
               "content":
               {
                   "id": "1",
                   "content": "文明靠大家",
                   "article_img": "www.baidu.com",
                   "user_id": "3",
                   "create_time": "198283727",
                   "time": "1976-04-14 06:48:47"
               }
           }
       ],
       "news_num": "1"
   },
   "num": "2"
}
```


### 3.动态-收藏推荐

#### Request
```
POST /Api/News/news_hot
```

#### Parameters：
- `token` 用户登录后拿去的用户标示

#### Response
```json
{
   "status": "0",
   "msg": "",
   "data":
   [
       {
           "user_info":
           {
               "id": "3",
               "nickname": "zhuchencong",
               "head_img": "",
               "title": "上海市"
           },
           "content_info":
           {
               "id": "1",
               "user_id": "3",
               "content": "文明靠大家",
               "city_id": "0",
               "article_img": "www.baidu.com",
               "create_time": "198283727",
               "support": "112",
               "nonsupport": "222",
               "recommend": "1",
               "longitude": "999.99999999999999999",
               "latitude": "999.99999999999999999"
           },
           "rem_num": "20"
       },
       {
           "user_info":
           {
               "id": "3",
               "nickname": "zhuchencong",
               "head_img": "",
               "title": "上海市"
           },
           "content_info":
           {
               "id": "2",
               "user_id": "3",
               "content": "文明靠大家",
               "city_id": "0",
               "article_img": "www.baidu.com",
               "create_time": "198283727",
               "support": "112",
               "nonsupport": "222",
               "recommend": "1",
               "longitude": "999.99999999999999999",
               "latitude": "999.99999999999999999"
           },
           "rem_num": "4"
       }
   ],
   "num": "2"
}
```


## 七、个人中心

### 1.个人中心-他人

#### Request
```
POST /Api/Personal/personal_other
```

#### Parameters：
- `token` 用户登录后拿去的用户标示
- `user_id` 查看用户ID

#### Response
```json
{
   "status": "0",
   "msg": "",
   "data":
   {
       "user_info":
       {
           "nickname": "zhuchencong",
           "head_img": "",
           "background_img": "",
           "integral": "1395",
           "title": "上海市",
           "photo_num": "2",
           "save_num": "0",
           "friend_num_yes": "2",
           "artcile_num": "2",
           "is_friend": "1"
       },
       "photo_info":
       [
           {
               "id": "1",
               "content": "文明靠大家",
               "article_img": "www.baidu.com",
               "create_time": "198283727",
               "longitude": "999.99999999999999999",
               "latitude": "999.99999999999999999",
               "tag_info":
               [
                   {
                       "id": "1",
                       "label_name": "软妹子"
                   },
                   {
                       "id": "2",
                       "label_name": "女汉子"
                   },
                   {
                       "id": "3",
                       "label_name": "抹茶"
                   }
               ],
               "like_info":
               [
                   {
                       "id": "3",
                       "head_img": ""
                   },
                   {
                       "id": "3",
                       "head_img": ""
                   },
                   {
                       "id": "3",
                       "head_img": ""
                   },
                   {
                       "id": "3",
                       "head_img": ""
                   },
                   {
                       "id": "3",
                       "head_img": ""
                   },
                   {
                       "id": "3",
                       "head_img": ""
                   },
                   {
                       "id": "3",
                       "head_img": ""
                   }
               ],
               "like_num": "20",
               "comment_num": "22"
           },
           {
               "id": "2",
               "content": "文明靠大家",
               "article_img": "www.baidu.com",
               "create_time": "198283727",
               "longitude": "999.99999999999999999",
               "latitude": "999.99999999999999999",
               "tag_info":
               [
                   {
                       "id": "3",
                       "label_name": "抹茶"
                   },
                   {
                       "id": "2",
                       "label_name": "女汉子"
                   }
               ],
               "like_info":
               [
                   {
                       "id": "3",
                       "head_img": ""
                   },
                   {
                       "id": "3",
                       "head_img": ""
                   },
                   {
                       "id": "3",
                       "head_img": ""
                   },
                   {
                       "id": "3",
                       "head_img": ""
                   }
               ],
               "like_num": "4",
               "comment_num": "4"
           }
       ],
       "article_num": "2"
   },
   "num": "3"
}
```


### 2.个人中心-自己

#### Request
```
POST /Api/Personal/personal_owner
```

#### Parameters：
- `token` 用户登录后拿去的用户标示

#### Response
```json
{
   "status": "0",
   "msg": "",
   "data":
   {
       "user_info":
       {
           "nickname": "zhuchencong",
           "head_img": "",
           "background_img": "",
           "integral": "1395",
           "title": "上海市",
           "photo_num": "2",
           "save_num": "0",
           "friend_num_yes": "2",
           "artcile_num": "2",
           "friend_num_no": "0"
       },
       "photo_info":
       [
           {
               "id": "1",
               "content": "文明靠大家",
               "article_img": "www.baidu.com",
               "create_time": "198283727",
               "longitude": "999.99999999999999999",
               "latitude": "999.99999999999999999",
               "tag_info":
               [
                   {
                       "id": "1",
                       "label_name": "软妹子"
                   },
                   {
                       "id": "2",
                       "label_name": "女汉子"
                   },
                   {
                       "id": "3",
                       "label_name": "抹茶"
                   }
               ],
               "like_info":
               [
                   {
                       "id": "3",
                       "head_img": ""
                   },
                   {
                       "id": "3",
                       "head_img": ""
                   },
                   {
                       "id": "3",
                       "head_img": ""
                   },
                   {
                       "id": "3",
                       "head_img": ""
                   },
                   {
                       "id": "3",
                       "head_img": ""
                   },
                   {
                       "id": "3",
                       "head_img": ""
                   },
                   {
                       "id": "3",
                       "head_img": ""
                   }
               ],
               "like_num": "20",
               "comment_num": "22"
           },
           {
               "id": "2",
               "content": "文明靠大家",
               "article_img": "www.baidu.com",
               "create_time": "198283727",
               "longitude": "999.99999999999999999",
               "latitude": "999.99999999999999999",
               "tag_info":
               [
                   {
                       "id": "3",
                       "label_name": "抹茶"
                   },
                   {
                       "id": "2",
                       "label_name": "女汉子"
                   }
               ],
               "like_info":
               [
                   {
                       "id": "3",
                       "head_img": ""
                   },
                   {
                       "id": "3",
                       "head_img": ""
                   },
                   {
                       "id": "3",
                       "head_img": ""
                   },
                   {
                       "id": "3",
                       "head_img": ""
                   }
               ],
               "like_num": "4",
               "comment_num": "4"
           }
       ],
       "article_num": "2"
   },
   "num": "3"
}
```


### 3.个人中心-话题

#### Request
```
POST /Api/Personal/personal_news
```

#### Parameters：
- `token` 用户登录后拿去的用户标示

#### Response
```json
{
   "status": "0",
   "msg": "",
   "data":
   {
       "user_info":
       {
           "nickname": "zhuchencong",
           "head_img": "",
           "background_img": "",
           "integral": "1395",
           "title": "上海市",
           "photo_num": "2",
           "save_num": "0",
           "friend_num_yes": "2",
           "artcile_num": "2",
           "friend_num_no": "0"
       },
       "photo_info":
       [
           {
               "id": "1",
               "content": "文明靠大家",
               "article_img": "www.baidu.com",
               "create_time": "198283727",
               "longitude": "999.99999999999999999",
               "latitude": "999.99999999999999999",
               "tag_info":
               [
                   {
                       "id": "1",
                       "label_name": "软妹子"
                   },
                   {
                       "id": "2",
                       "label_name": "女汉子"
                   },
                   {
                       "id": "3",
                       "label_name": "抹茶"
                   }
               ],
               "like_info":
               [
                   {
                       "id": "3",
                       "head_img": ""
                   },
                   {
                       "id": "3",
                       "head_img": ""
                   },
                   {
                       "id": "3",
                       "head_img": ""
                   },
                   {
                       "id": "3",
                       "head_img": ""
                   },
                   {
                       "id": "3",
                       "head_img": ""
                   },
                   {
                       "id": "3",
                       "head_img": ""
                   },
                   {
                       "id": "3",
                       "head_img": ""
                   }
               ],
               "like_num": "20",
               "comment_num": "22"
           },
           {
               "id": "2",
               "content": "文明靠大家",
               "article_img": "www.baidu.com",
               "create_time": "198283727",
               "longitude": "999.99999999999999999",
               "latitude": "999.99999999999999999",
               "tag_info":
               [
                   {
                       "id": "3",
                       "label_name": "抹茶"
                   },
                   {
                       "id": "2",
                       "label_name": "女汉子"
                   }
               ],
               "like_info":
               [
                   {
                       "id": "3",
                       "head_img": ""
                   },
                   {
                       "id": "3",
                       "head_img": ""
                   },
                   {
                       "id": "3",
                       "head_img": ""
                   },
                   {
                       "id": "3",
                       "head_img": ""
                   }
               ],
               "like_num": "4",
               "comment_num": "4"
           }
       ],
       "article_num": "2"
   },
   "num": "3"
}
```


### 4.个人中心-积分

#### Request
```
POST /Api/Personal/personal_score
```

#### Parameters：
- `token` 用户登录后拿去的用户标示

#### Response
```json
{
   "status": "0",
   "msg": "获取成功",
   "data":
   {
       "store": "1150",
       "fund": "0",
       "task_list":
       [
           {
               "id": "10",
               "title": "凯铎基金每日领",
               "num": "1",
               "integral": "100",
               "status": "0",
               "end_number": "1",
               "is_end": "1"
           },
           {
               "id": "9",
               "title": "给我们宝贵建议",
               "num": "1",
               "integral": "30",
               "status": "0",
               "end_number": "1",
               "is_end": "1"
           },
           {
               "id": "8",
               "title": "分享给朋友",
               "num": "1",
               "integral": "30",
               "status": "0",
               "end_number": "0",
               "is_end": "2"
           },
           {
               "id": "7",
               "title": "邀请好友一起来!",
               "num": "1",
               "integral": "30",
               "status": "0",
               "end_number": "0",
               "is_end": "2"
           },
           {
               "id": "6",
               "title": "参与文明大PK",
               "num": "10",
               "integral": "10",
               "status": "0",
               "end_number": "0",
               "is_end": "2"
           },
           {
               "id": "5",
               "title": "对话题进行评论",
               "num": "10",
               "integral": "20",
               "status": "0",
               "end_number": "0",
               "is_end": "2"
           },
           {
               "id": "4",
               "title": "给文明行为点个赞噢!",
               "num": "10",
               "integral": "20",
               "status": "0",
               "end_number": "0",
               "is_end": "2"
           },
           {
               "id": "3",
               "title": "发表一个话题吧!",
               "num": "10",
               "integral": "50",
               "status": "0",
               "end_number": "0",
               "is_end": "2"
           },
           {
               "id": "2",
               "title": "每天登入领积分!",
               "num": "1",
               "integral": "30",
               "status": "0",
               "end_number": "1",
               "is_end": "1"
           },
           {
               "id": "1",
               "title": "完成注册",
               "num": "1",
               "integral": "50",
               "status": "0",
               "end_number": "1",
               "is_end": "2"
           }
       ]
   },
   "num": "3"
}
```


### 5.个人中心-头像

#### Request
```
POST /Api/Personal/personal_edit_head
```

#### Parameters：
- `token` 用户登录后拿去的用户标示
- `data` $_FILES['data']

#### Response
```json
待确认
```


### 6.个人中心-昵称

#### Request
```
POST /Api/Personal/personal_edit_nickname
```

#### Parameters：
- `token` 用户登录后拿去的用户标示
- `nickName` 昵称

#### Response
```json
{
   "status": "0",
   "msg": "",
   "data": "",
   "num": "1"
}
```


### 7.个人中心-性别

#### Request
```
POST /Api/Personal/personal_edit_sex
```

#### Parameters：
- `token` 用户登录后拿去的用户标示
- `user_sex` 用户性别 1男2女

#### Response
```json
{
   "status": "0",
   "msg": "",
   "data": "",
   "num": "1"
}
```


### 8.个人中心-城市

#### Request
```
POST /Api/Personal/personal_edit_city
```

#### Parameters：
- `token` 用户登录后拿去的用户标示
- `city_id` 城市ID

#### Response
```json
{
   "status": "0",
   "msg": "",
   "data": "",
   "num": "1"
}
```

### 9.个人中心-修改全部数据

#### Request
```
POST /Api/Personal/personal_all_change
```

#### Parameters：
- `token` 用户登录后拿去的用户标示
- `nickname` 昵称
- `user_sex` 性别
- `city_id` 城市ID
- `article_img` 给安卓哥们使用的接口
- `img` 用户头像可传可以不传

- `interest` 兴趣爱好
- `name` 收货地址姓名
- `address` 收获地址
- `age` 年龄
- `address_phone` 收获地址电话


#### Response
```json
{
  "status":"0",
  "msg":"修改成功",
  "data":"",
  "num":"1"
}
```

### 10.个人中心-头像

#### Request
```
POST /Api/Personal/personal_edit_background
```

#### Parameters：
- `token` 用户登录后拿去的用户标示
- `background_img`

#### Response
```json
{
   "status": "0",
   "msg": "",
   "data": "",
   "num": "1"
}
```

### 11.个人中心-他人的话题

#### Request
```
POST /Api/Personal/personal_other_news
```

#### Parameters：
- `token` 用户登录后拿去的用户标示
- `other_user_id` 他人的ID

#### Response
```json
{
   "status": "0",
   "msg": "",
   "data":
   {
       "user_info":
       {
           "nickname": "zhuchencong",
           "head_img": "",
           "background_img": "",
           "integral": "1395",
           "title": "上海市",
           "photo_num": "2",
           "save_num": "0",
           "friend_num_yes": "2",
           "artcile_num": "2",
           "friend_num_no": "0"
       },
       "photo_info":
       [
           {
               "id": "1",
               "content": "文明靠大家",
               "article_img": "www.baidu.com",
               "create_time": "198283727",
               "longitude": "999.99999999999999999",
               "latitude": "999.99999999999999999",
               "tag_info":
               [
                   {
                       "id": "1",
                       "label_name": "软妹子"
                   },
                   {
                       "id": "2",
                       "label_name": "女汉子"
                   },
                   {
                       "id": "3",
                       "label_name": "抹茶"
                   }
               ],
               "like_info":
               [
                   {
                       "id": "3",
                       "head_img": ""
                   },
                   {
                       "id": "3",
                       "head_img": ""
                   },
                   {
                       "id": "3",
                       "head_img": ""
                   },
                   {
                       "id": "3",
                       "head_img": ""
                   },
                   {
                       "id": "3",
                       "head_img": ""
                   },
                   {
                       "id": "3",
                       "head_img": ""
                   },
                   {
                       "id": "3",
                       "head_img": ""
                   }
               ],
               "like_num": "20",
               "comment_num": "22"
           },
           {
               "id": "2",
               "content": "文明靠大家",
               "article_img": "www.baidu.com",
               "create_time": "198283727",
               "longitude": "999.99999999999999999",
               "latitude": "999.99999999999999999",
               "tag_info":
               [
                   {
                       "id": "3",
                       "label_name": "抹茶"
                   },
                   {
                       "id": "2",
                       "label_name": "女汉子"
                   }
               ],
               "like_info":
               [
                   {
                       "id": "3",
                       "head_img": ""
                   },
                   {
                       "id": "3",
                       "head_img": ""
                   },
                   {
                       "id": "3",
                       "head_img": ""
                   },
                   {
                       "id": "3",
                       "head_img": ""
                   }
               ],
               "like_num": "4",
               "comment_num": "4"
           }
       ],
       "article_num": "2"
   },
   "num": "3"
}
```

### 12.个人中心-领取积分

#### Request
```
POST /Api/Personal/personal_score_insert
```

#### Parameters：
- `token` 用户登录后拿去的用户标示
- `score_id` 积分ID 1到9

#### Response
```json
{
   "status": "0",
   "msg": "领取成功",
   "data": "",
   "num": "1"
}
```

### 13.个人中心-任务端专用接口

#### Request
```
POST /Api/Personal/personal_msg
```

#### Parameters：
- `token` 用户登录后拿去的用户标示
- `type_id` 任务ID ID编号 7.邀请好友 8.分享给朋友

#### Response
```json
{
   "status": "0",
   "msg": "接受成功",
   "data": "",
   "num": "1"
}
```

### 14.个人中心-反馈建议

#### Request
```
POST /Api/Personal/personal_feedback
```

#### Parameters：
- `token` 用户登录后拿去的用户标示
- `content` 反馈建议

#### Response
```json
{
   "status": "0",
   "msg": "反馈成功",
   "data": "",
   "num": "1"
}
```

## 八、照片详情

### 1.照片详情

#### Request
```
POST /Api/Photo/photo_verify
```

#### Parameters：
- `token` 用户登录后拿去的用户标示
- `photo_id` 照片ID

#### Response
```json
{
   "status": "0",
   "msg": "",
   "data":
   {
       "user_info":
       {
           "id": "3",
           "nickname": "朱大爷",
           "head_img": "",
           "title": "北京市"
       },
       "photo_info":
       {
           "id": "1",
           "user_id": "3",
           "content": "文明靠大家",
           "city_id": "0",
           "article_img": "www.baidu.com",
           "create_time": "198283727",
           "support": "112",
           "nonsupport": "222",
           "recommend": "1",
           "longitude": "999.99999999999999999",
           "latitude": "999.99999999999999999",
           "tag_info":
           [
               {
                   "id": "1",
                   "label_name": "软妹子"
               },
               {
                   "id": "2",
                   "label_name": "女汉子"
               },
               {
                   "id": "3",
                   "label_name": "抹茶"
               }
           ],
           "like_list":
           [
               {
                   "id": "3",
                   "head_img": ""
               },
               {
                   "id": "3",
                   "head_img": ""
               },
               {
                   "id": "3",
                   "head_img": ""
               },
               {
                   "id": "3",
                   "head_img": ""
               },
               {
                   "id": "3",
                   "head_img": ""
               },
               {
                   "id": "3",
                   "head_img": ""
               },
               {
                   "id": "3",
                   "head_img": ""
               }
           ],
           "like_num": "20"
       }
   },
   "num": "2"
}
```


### 2.照片详情讨论

#### Request
```
POST /Api/Photo/photo_verify_content
```

#### Parameters：
- `token` 用户登录后拿去的用户标示
- `photo_id` 照片ID

#### Response
```json
{
   "status": "0",
   "msg": "",
   "data":
   {
       "count": "22",
       "commemt_info":
       [
           {
               "id": "1",
               "content": "测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试",
               "create_time": "2009-01-19 13:22:01",
               "user_id": "3",
               "nickname": "朱大爷",
               "head_img": ""
           },
           {
               "id": "2",
               "content": "测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试",
               "create_time": "2009-01-19 13:22:01",
               "user_id": "3",
               "nickname": "朱大爷",
               "head_img": ""
           },
           {
               "id": "3",
               "content": "测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试",
               "create_time": "2009-01-19 13:22:01",
               "user_id": "3",
               "nickname": "朱大爷",
               "head_img": ""
           },
           {
               "id": "4",
               "content": "测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试",
               "create_time": "2009-01-19 13:22:01",
               "user_id": "3",
               "nickname": "朱大爷",
               "head_img": ""
           },
           {
               "id": "5",
               "content": "测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试",
               "create_time": "2009-01-19 13:22:01",
               "user_id": "3",
               "nickname": "朱大爷",
               "head_img": ""
           },
           {
               "id": "6",
               "content": "测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试",
               "create_time": "2009-01-19 13:22:01",
               "user_id": "3",
               "nickname": "朱大爷",
               "head_img": ""
           },
           {
               "id": "7",
               "content": "测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试",
               "create_time": "2009-01-19 13:22:01",
               "user_id": "3",
               "nickname": "朱大爷",
               "head_img": ""
           },
           {
               "id": "8",
               "content": "测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试",
               "create_time": "2009-01-19 13:22:01",
               "user_id": "3",
               "nickname": "朱大爷",
               "head_img": ""
           },
           {
               "id": "9",
               "content": "测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试",
               "create_time": "2009-01-19 13:22:01",
               "user_id": "3",
               "nickname": "朱大爷",
               "head_img": ""
           },
           {
               "id": "10",
               "content": "测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试",
               "create_time": "2009-01-19 13:22:01",
               "user_id": "3",
               "nickname": "朱大爷",
               "head_img": ""
           }
       ]
   },
   "num": "2"
}
```


### 3.照片投票

#### Request
```
POST /Api/Photo/photo_vote
```

#### Parameters：
- `token` 用户登录后拿去的用户标示
- `photo_id` 照片ID
- `vote_info` 1-文明 2-不文明

#### Response
```json
{
   "status": "0",
   "msg": "",
   "data": "",
   "num": "1"
}
```


### 4.照片详情讨论

#### Request
```
POST /Api/Photo/photo_comment
```

#### Parameters：
- `token` 用户登录后拿去的用户标示
- `photo_id` 照片ID
- `comment_content` 照片评论

#### Response
```json
{
   "status": "0",
   "msg": "",
   "data": "",
   "num": "1"
}
```

### 5.照片赞

#### Request
```
POST /Api/Photo/photo_like
```

#### Parameters：
- `token` 用户登录后拿去的用户标示
- `photo_id` 照片ID 赞过会取消赞

#### Response
```json
{
   "status": "0",
   "msg": "",
   "data": "",
   "num": "1"
}
```

### 6.照片举报

#### Request
```
POST /Api/Photo/photo_report
```

#### Parameters：
- `token` 用户登录后拿去的用户标示
- `photo_id` 举报的照片ID

#### Response
```json
{
   "status": "0",
   "msg": "",
   "data": "",
   "num": "1"
}
```

## 九、搜索

### 1.搜索-拍友

#### Request
```
POST /Api/Search/search_friends
```

#### Parameters：
- `token` 用户登录后拿去的用户标示
- `user_name` 搜索的用户名

#### Response
```json
{
   "status": "0",
   "msg": "",
   "data":
   [
       {
           "id": "4",
           "nickname": "朱十2",
           "head_img": "",
           "title": "上海市"
       },
       {
           "id": "5",
           "nickname": "朱十3",
           "head_img": "",
           "title": "上海市"
       },
       {
           "id": "7",
           "nickname": "朱十4",
           "head_img": "",
           "title": ""
       },
       {
           "id": "8",
           "nickname": "朱十5",
           "head_img": "",
           "title": ""
       }
   ],
   "num": "4"
}
```

### 2.搜索-标签-随机

#### Request
```
POST /Api/Search/search_tag_random
```

#### Parameters：
- `token` 用户登录后拿去的用户标示

#### Response
```json
{
   "status": "0",
   "msg": "",
   "data":
   [
       {
           "user_info":
           {
               "id": "3",
               "nickname": "朱大爷",
               "head_img": "",
               "title": "北京市"
           },
           "content":
           {
               "id": "1",
               "user_id": "3",
               "content": "文明靠大家",
               "city_id": "0",
               "article_img": "www.baidu.com",
               "create_time": "198283727",
               "support": "112",
               "nonsupport": "222",
               "recommend": "1",
               "longitude": "999.99999999999999999",
               "latitude": "999.99999999999999999",
               "time": "1976-04-14 06:48:47",
               "list_num": "1"
           }
       }
   ],
   "num": "1"
}
```


### 3.搜索-标签

#### Request
```
POST /Api/Search/search_tag
```

#### Parameters：
- `token` 用户登录后拿去的用户标示
- `label_name` 标签名

#### Response
```json
{
   "status": "0",
   "msg": "",
   "data":
   [
       {
           "user_info":
           {
               "id": "3",
               "nickname": "朱大爷",
               "head_img": "",
               "title": "北京市"
           },
           "content":
           {
               "id": "1",
               "user_id": "3",
               "content": "文明靠大家",
               "city_id": "0",
               "article_img": "www.baidu.com",
               "create_time": "198283727",
               "support": "112",
               "nonsupport": "222",
               "recommend": "1",
               "longitude": "999.99999999999999999",
               "latitude": "999.99999999999999999",
               "time": "1976-04-14 06:48:47",
               "list_num": "1"
           }
       },
       {
           "user_info":
           {
               "id": "3",
               "nickname": "朱大爷",
               "head_img": "",
               "title": "北京市"
           },
           "content":
           {
               "id": "2",
               "user_id": "3",
               "content": "文明靠大家",
               "city_id": "0",
               "article_img": "www.baidu.com",
               "create_time": "198283727",
               "support": "112",
               "nonsupport": "222",
               "recommend": "1",
               "longitude": "999.99999999999999999",
               "latitude": "999.99999999999999999",
               "time": "1976-04-14 06:48:47",
               "list_num": "4"
           }
       }
   ],
   "num": "2"
}
```

### 5.搜索-拍友-随机

#### Request
```
POST /Api/Search/search_friends_random
```

#### Parameters：
- `token` 用户登录后拿去的用户标示

#### Response
```json
{
   "status": "0",
   "msg": "",
   "data":
   [
       {
           "id": "4",
           "nickname": "朱十2",
           "head_img": "",
           "city_id": "1"
       },
       {
           "id": "2",
           "nickname": "测试1",
           "head_img": "",
           "city_id": "0"
       },
       {
           "id": "7",
           "nickname": "朱十4",
           "head_img": "",
           "city_id": "0"
       },
       {
           "id": "8",
           "nickname": "朱十5",
           "head_img": "",
           "city_id": "0"
       },
       {
           "id": "1",
           "nickname": "管理员",
           "head_img": "",
           "city_id": "0"
       },
       {
           "id": "5",
           "nickname": "朱十3",
           "head_img": "",
           "city_id": "1"
       }
   ],
   "num": "6"
}
```

### 6.搜索-根据标签ID

#### Request
```
POST /Api/Search/search_tag_id
```

#### Parameters：
- `tag_id` 标签ID

#### Response
```json
{
    "status": "0",
    "msg": "",
    "data":
    {
       "all_count": "4",
       "info":
       [
           {
               "user_info":
               {
                   "id": "11",
                   "nickname": "Kidddd",
                   "head_img": "20150204/54d1bfd75abde.jpg",
                   "title": ""
               },
               "photo_info":
               {
                   "id": "128",
                   "article_id": "128",
                   "label_id": "2",
                   "user_id": "11",
                   "content": "",
                   "city_id": "1",
                   "article_img": "http://localhost/App/Uploads/20150211/54dafb5417afc.jpg",
                   "create_time": "1423637332",
                   "support": "0",
                   "nonsupport": "0",
                   "recommend": "0",
                   "longitude": "1.00000000000000000",
                   "latitude": "1.00000000000000000",
                   "photo_time": "2015-02-11 14:48:52",
                   "tag_info":
                   [
                       {
                           "id": "2",
                           "label_name": "女汉子"
                       },
                       {
                           "id": "9",
                           "label_name": "二炮手"
                       }
                   ],
                   "like_info":
                   {
                       "like_num": "1",
                       "like_list":
                       [
                           {
                               "id": "11",
                               "head_img": "20150204/54d1bfd75abde.jpg"
                           }
                       ]
                   },
                   "comment_num": "0"
               }
           },
           {
               "user_info":
               {
                   "id": "3",
                   "nickname": "wish…xy",
                   "head_img": "20150211/54dafbb1668ec.jpg",
                   "title": "上海市"
               },
               "photo_info":
               {
                   "id": "119",
                   "article_id": "119",
                   "label_id": "2",
                   "user_id": "3",
                   "content": "",
                   "city_id": "1",
                   "article_img": "http://localhost/App/Uploads/20150210/54d9bce2888d6.jpg",
                   "create_time": "1423555811",
                   "support": "0",
                   "nonsupport": "0",
                   "recommend": "0",
                   "longitude": "121.42888300000000000",
                   "latitude": "31.26616700000000000",
                   "photo_time": "2015-02-10 16:10:11",
                   "tag_info":
                   [
                       {
                           "id": "9",
                           "label_name": "二炮手"
                       },
                       {
                           "id": "5",
                           "label_name": "千奇百怪的奇葩"
                       },
                       {
                           "id": "2",
                           "label_name": "女汉子"
                       }
                   ],
                   "like_info":
                   {
                       "like_num": "1",
                       "like_list":
                       [
                           {
                               "id": "11",
                               "head_img": "20150204/54d1bfd75abde.jpg"
                           }
                       ]
                   },
                   "comment_num": "0"
               }
           },
           {
               "user_info":
               {
                   "id": "3",
                   "nickname": "wish…xy",
                   "head_img": "20150211/54dafbb1668ec.jpg",
                   "title": "上海市"
               },
               "photo_info":
               {
                   "id": "1",
                   "article_id": "1",
                   "label_id": "2",
                   "user_id": "3",
                   "content": "文明靠大家",
                   "city_id": "1",
                   "article_img": "http://localhost/App/Uploads/20150204/54d1b2b28e39b.jpg",
                   "create_time": "198283727",
                   "support": "112",
                   "nonsupport": "222",
                   "recommend": "1",
                   "longitude": "999.99999999999999999",
                   "latitude": "999.99999999999999999",
                   "photo_time": "1976-04-14 06:48:47",
                   "tag_info":
                   [
                       {
                           "id": "1",
                           "label_name": "软妹子"
                       },
                       {
                           "id": "2",
                           "label_name": "女汉子"
                       },
                       {
                           "id": "3",
                           "label_name": "抹茶"
                       }
                   ],
                   "like_info":
                   {
                       "like_num": "1",
                       "like_list":
                       [
                           {
                               "id": "11",
                               "head_img": "20150204/54d1bfd75abde.jpg"
                           }
                       ]
                   },
                   "comment_num": "22"
               }
           },
           {
               "user_info":
               {
                   "id": "3",
                   "nickname": "wish…xy",
                   "head_img": "20150211/54dafbb1668ec.jpg",
                   "title": "上海市"
               },
               "photo_info":
               {
                   "id": "2",
                   "article_id": "2",
                   "label_id": "2",
                   "user_id": "3",
                   "content": "文明靠大家",
                   "city_id": "1",
                   "article_img": "http://localhost/App/Uploads/20150204/54d1b2b28e39b.jpg",
                   "create_time": "198283727",
                   "support": "113",
                   "nonsupport": "222",
                   "recommend": "1",
                   "longitude": "999.99999999999999999",
                   "latitude": "999.99999999999999999",
                   "photo_time": "1976-04-14 06:48:47",
                   "tag_info":
                   [
                       {
                           "id": "3",
                           "label_name": "抹茶"
                       },
                       {
                           "id": "2",
                           "label_name": "女汉子"
                       }
                   ],
                   "like_info":
                   {
                       "like_num": "0",
                       "like_list": ""
                   },
                   "comment_num": "4"
               }
           }
       ]
    },
"num": "2"
}
```

## 十一、上传照片

### 1.上传图片-热门标签

#### Request
```
POST /Api/Uploadphoto/upload_tags
```

#### Parameters：
- `token` 用户登录后拿去的用户标示

#### Response
```json
{
   "status": "0",
   "msg": "",
   "data":
   [
       {
           "id": "3",
           "label_name": "抹茶",
           "is_hot": "1"
       },
       {
           "id": "5",
           "label_name": "千奇百怪的奇葩",
           "is_hot": "1"
       },
       {
           "id": "7",
           "label_name": "小强",
           "is_hot": "1"
       }
   ],
   "num": "3"
}
```


### 2.上传图片-标签搜索

#### Request
```
POST /Api/Uploadphoto/upload_tag_search
```

#### Parameters：
- `token` 用户登录后拿去的用户标示
- `tag_name` 标签名称

#### Response
```json
{
   "status": "0",
   "msg": "",
   "data":
   [
       {
           "id": "2",
           "label_name": "女汉子",
           "is_hot": "0"
       }
   ],
   "num": "1"
}
```



### 3.上传图片

#### Request
```
POST /Api/Uploadphoto/upload_photo
```

#### Parameters：
- `token` 用户登录后拿去的用户标示
- `content` 标题内容
- `longitude` 经度
- `latitude` 纬度
- `city_id` 城市ID
- `tags` 标签数组
- `img` 图片信息

- `article_img` 图片信息（安卓)

#### Response
```json
{
   "status": "0",
   "msg": "上传成功",
   "data": "",
   "num": "1"
}
```

### 3.1.上传图片

#### Request
```
POST /Api/Uploadphoto/upload_afile
```

#### Parameters：
- `img` 图片信息

#### Response
```json
返回文件名称
```

### 3.2.如果上传视频失败就掉用这个接口

#### Request
```
POST /Api/Uploadphoto/delete_img_file
```

#### Parameters：
- `old_article_img` 之前上传的图片的信息

#### Response
```json
{
   "status": "0",
   "msg": "删除成功",
   "data": "",
   "num": "1"
}
```

### 4.上传图片-标签-随机

#### Request
```
POST /Api/Uploadphoto/upload_tags_random
```

#### Parameters：
- `token` 用户登录后拿去的用户标示

#### Response
```json
{
   "status": "0",
   "msg": "",
   "data":
   [
       {
           "id": "2",
           "label_name": "女汉子",
           "is_hot": "0"
       },
       {
           "id": "1",
           "label_name": "软妹子",
           "is_hot": "0"
       },
       {
           "id": "6",
           "label_name": "文艺青年",
           "is_hot": "0"
       },
       {
           "id": "7",
           "label_name": "小强",
           "is_hot": "1"
       },
       {
           "id": "5",
           "label_name": "千奇百怪的奇葩",
           "is_hot": "1"
       },
       {
           "id": "3",
           "label_name": "抹茶",
           "is_hot": "1"
       },
       {
           "id": "4",
           "label_name": "屌丝",
           "is_hot": "0"
       }
   ],
   "num": "7"
}
```

### 5.上传标签

#### Request
```
POST /Api/Uploadphoto/upload_tags_name
```

#### Parameters：
- `token` 用户登录后拿去的用户标示
- `name` 上传标签名称

#### Response
```json
        {
           "status": "0",
           "msg": "",
           "data":
           {
               "id": "12",
               "label_name": "萨米耶",
               "is_hot": "0"
           },
           "num": "3"
        }
```

## 十二、城市

### 1.获取可用城市列表

#### Request
```
POST /Api/City/index
```

#### Response
```json
{
  "status": "0",
  "msg": "获取成功",
  "data": [
  {
    "city_id": "1",
    "city_name": "上海市"
    },
    {
      "city_id": "2",
      "city_name": "北京市"
      },
      {
        "city_id": "3",
        "city_name": "广州市"
      }
      ],
      "num": "3"
    }
```
