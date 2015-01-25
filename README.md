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
    "account": "13761951734",
    "nickname": "",
    "city_id": "0",
    "head_img": "",
    "sex": "1",
    "background_img": "",
    "integral": "0",
    "last_login_time": "2015-01-17 18:00:07",
    "login_count": "2",
    "create_time": "2015-01-17 17:52:11"
  },
  "num": "10",
  "token": "D2RWPgVmCDIDZAVkBWRTZ1JuBjQBPVU2W24AOgQ2AmdbNlo9VCsIMQBhUSsCYwE0"
}

```

### 2.注册用户接口

#### Request
```
  POST /Api/Login/register
```

#### Parameters：
- `account` 账号(手机号)
- `password` 密码
- `password_confirm` 重复密码


#### Response
```json
{
  "status": "0",
  "msg": "注册成功",
  "data":
  {
    "token": "CW1bMwJhCjADZABhVzYCNgI+UWMMMAVmV2NWbFdlVTAAbVcwUC8JMFw9AHoGZwM2"
    },
    "num": "1"
  }
```


### 3.注册短信接口

#### Request
```
POST /Api/Login/regeister_cell_veritify
```

#### Parameters：
- `cell_phone` 账号(手机号)

#### Response
```json
{
   "status": "2002",
   "msg": "手机号已被注册",
   "data":
   [
   ],
   "num": "0"
}
```

### 4.注册手机号验证

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

## 三、首页接口

### 1.申请好友

#### Request
```
POST /Api/Home/home_data
```

#### Parameters：
- `token` 用户登录后拿去的用户标示
- `city` 城市ID 可有可不有，有就搜索该城市下的文章
- `type` 1-是根据时间 2-根据最近
- `p` 第几页
- `lng` 精度
- `lat` 纬度
- `count` 数量

#### Response
```json
{
   "status": "0",
   "msg": "",
   "data":
   {
       "all_count": "2",
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
                       "like_num": "20",
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
                       ]
                   }
               }
           },
           {
               "user_info":
               {
                   "id": "3",
                   "nickname": "zhuchencong",
                   "head_img": "",
                   "title": "上海市"
               },
               "photo_info":
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
                       "like_num": "4",
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
                           }
                       ]
                   }
               }
           }
       ]
   },
   "num": "2"
}
```


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
       "like_list":
       [
           {
               "id": "3",
               "nickname": "zhuchencong",
               "head_img": "",
               "title": "上海市",
               "create_time": "0"
           },
           {
               "id": "3",
               "nickname": "zhuchencong",
               "head_img": "",
               "title": "上海市",
               "create_time": "0"
           },
           {
               "id": "3",
               "nickname": "zhuchencong",
               "head_img": "",
               "title": "上海市",
               "create_time": "0"
           },
           {
               "id": "3",
               "nickname": "zhuchencong",
               "head_img": "",
               "title": "上海市",
               "create_time": "0"
           },
           {
               "id": "3",
               "nickname": "zhuchencong",
               "head_img": "",
               "title": "上海市",
               "create_time": "0"
           },
           {
               "id": "3",
               "nickname": "zhuchencong",
               "head_img": "",
               "title": "上海市",
               "create_time": "0"
           },
           {
               "id": "3",
               "nickname": "zhuchencong",
               "head_img": "",
               "title": "上海市",
               "create_time": "0"
           },
           {
               "id": "3",
               "nickname": "zhuchencong",
               "head_img": "",
               "title": "上海市",
               "create_time": "0"
           },
           {
               "id": "3",
               "nickname": "zhuchencong",
               "head_img": "",
               "title": "上海市",
               "create_time": "0"
           },
           {
               "id": "3",
               "nickname": "zhuchencong",
               "head_img": "",
               "title": "上海市",
               "create_time": "0"
           }
       ],
       "like_num": "20"
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

