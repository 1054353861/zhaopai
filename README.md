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
- `nickname` 昵称
- `password` 密码
- `password_confirm` 重复密码
- `user_sex` 用户性别
- `cell_phone` 手机号
- `user_city` 城市ID
- `$_FILES['user_avater']` 用户头像


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
POST /Api/Marke/marke_list
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
   "msg": "",
   "data":
   {
       "store": "1395",
       "task_list":
       [
           {
               "id": "1",
               "title": "掉节操",
               "integral": "100",
               "is_end": "1"
           },
           {
               "id": "2",
               "title": "掉贞操",
               "integral": "1000",
               "is_end": "1"
           },
           {
               "id": "3",
               "title": "约炮",
               "integral": "10000",
               "is_end": "1"
           }
       ]
   },
   "num": "2"
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
- `$_FILES['img']` 图片信息

#### Response
```json
需要讨论视频如何处理,LINUX需要安装ffmpng
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