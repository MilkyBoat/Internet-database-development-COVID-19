import json
import requests
import pymysql

# Team: 布里啾啾迪布里多, NKU
# coding by 徐云凯 1713667
# 爬虫，调用api得到每日最新的记录信息，并写入数据库

# api中的国家与地区id 映射到 geojson数据中的国家与地区id
id2pid = [1, 3, 46, -1, 2, -1, 5, 6, 8, 8, 8, 8, 8, 8, 8, 8, 9, 10, 17, -1,
          15, -1, 19, 12, 13, 25, 22, 18, 23, 24, 16, 14, -1, 88, 33, 28, 28, 28, 28, 28,
          28, 28, 28, 28, 28, 28, 27, 156, 30, 31, 31, 31, 31, 31, 31, 31, 31, 31, 31, 31,
          31, 31, 31, 31, 31, 31, 31, 31, 31, 31, 31, 31, 31, 31, 31, 31, 31, 31, 31, 31,
          31, 31, 36, 35, 34, 37, 32, 71, 0, 38, 40, 41, 44, 66, 44, 43, 45, 47, 48, 146,
          64, 49, 51, -1, 52, 54, 53, 68, 56, 56, 56, 116, 56, 56, 56, 56, 56, 57, 62, 59,
          42, 60, 65, 67, 61, 69, 72, -1, 70, 73, 79, 75, 74, 77, 78, 76, 80, 81, 82, 84,
          83, 85, 86, 89, 91, 87, 100, 93, 94, -1, 98, 99, 103, 114, -1, 107, 112, -1, 104, 102,
          -1, 110, 109, 101, 115, 122, 120, 120, 120, 120, 123, 119, 117, 118, 105, 121, 124, 125, 126, 129,
          134, 127, 128, 130, 133, 135, 136, 137, 138, -1, -1, -1, 140, 143, 149, -1, -1, 151, 152, 147,
          177, 50, 96, 141, 150, 153, 29, 165, 166, 158, 157, 162, 163, 164, 167, 168, 4, 21, 58, 58,
          58, 58, 58, 58, 169, 170, 171, 172, 173, 178, 179, 28, 45, -1, 111, 155, 161, 20, 92, 95,
          175, 63, 106, -1, 28, 28, 90, 108, 58, 58, 58, -1, 26, 11, 145, 120, 113, 55, 7, 142,
          139, -1, 176, -1, 159, 97]

url = "https://coronavirus-tracker-api.herokuapp.com/v2/locations"
data_json = requests.get(url)
rec_list = data_json.json()["locations"]

data_list = [[]] * 179
for i in range(179):
    data_list[i] = [i + 1, 0, 0, 0]
for rec in rec_list:
    if rec["id"] >= 0:
        c_pid = id2pid[rec["id"]] - 1
        data_list[c_pid][1] += rec["latest"]["confirmed"]
        data_list[c_pid][2] += rec["latest"]["recovered"]
        data_list[c_pid][3] += rec["latest"]["deaths"]
last_date = rec_list[0]["last_updated"]
last_date = last_date[: last_date.find('T')]
print(last_date)

c_list_file = open("id_list.txt", 'r', encoding='utf-8')
country_name_list = []
lines = c_list_file.readlines()
c_list_file.close()
for line in lines:
    country_name_list.append(line.split('\t'))

db = pymysql.connect("49.233.130.58", "db_user_proj", "NiePeng_niubi", "covid19")
cursor = db.cursor()
sql0 = """INSERT INTO `covid_map` (`pid`, `date`, `placename`, `confirm`, `cured`, `death`) VALUES ("""

for c in data_list:
    sql = sql0 + str(c[0]) + ",'" + last_date + "','" + country_name_list[c[0] - 1][2] + "'," + str(c[1]) + "," + str(c[2]) + "," + str(c[3]) + ")"
    print(sql)
    try:
        cursor.execute(sql)  # 执行sql语句
        db.commit()          # 执行sql语句
    except:
        db.rollback()        # 发生错误时回滚
        print('error in execute sql: ', sql)
db.close()
