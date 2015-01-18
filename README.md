# 接口文档


## 一、登录接口

### 1.用户中心接口

#### Request
```
POST /Api/Login/login
```

##### Parameters：
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

##### Parameters：
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
POST /Api/SendMsg/user_account_register
```

##### Parameters：
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


## 二、新闻动态接口

### 1.动态-动态

#### Request
```
POST /Api/News/news_active
```

##### Parameters：
- `token` 用户登录后拿去的用户标示

#### Response
```json

```


### 2.动态-动态

#### Request
```
POST /Api/News/news_save
```

##### Parameters：
- `token` 用户登录后拿去的用户标示

#### Response
```json

```
