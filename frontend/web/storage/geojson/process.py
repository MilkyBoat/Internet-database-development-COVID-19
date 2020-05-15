import json
import re
import requests
import time


data_name = "countries_geo.json"
output_name = "countries_id.json"
url = "http://fanyi.youdao.com/translate"

with open(data_name, "r") as f:
    datas = json.loads(f.read())
    # c_name_en_s = ""
    # c_name_cn = []
    # cnt = 0
    # for c in datas["features"]:
    #     next_c = c["properties"]["name"]
    #     c_name_en_s += next_c + ', '
    #     if len(c_name_en_s) + len(next_c) > 700 or cnt == (len(datas["features"]) - 1):
    #         print(len(c_name_en_s))
    #         c_name_en_s = c_name_en_s[:-2]
    #         trans_data = {
    #             'doctype': 'json',
    #             'type': 'EN2ZH_CN',
    #             'i': c_name_en_s
    #         }
    #         trans_rsponse = requests.get(url, params=trans_data)
    #         c_name_cn_s = trans_rsponse.json()['translateResult'][0][0]["tgt"]
    #         temp = re.split(',|，|、|, ', c_name_cn_s)
    #         c_name_cn.extend(temp)
    #         c_name_en_s = ""
    #         time.sleep(0.1)
    #     cnt += 1

    # print(c_name_cn)

    cnt = 1
    c_info = []
    trans_data = {
        'doctype': 'json',
        'type': 'EN2ZH_CN',
        'i': ''
    }
    for c in datas["features"]:
        trans_data['i'] = c["properties"]["name"]
        trans_rsponse = requests.get(url, params=trans_data)
        c_name_cn = trans_rsponse.json()['translateResult'][0][0]["tgt"]
        c_info.append({
            "pid": cnt,
            "abbreviation": c["id"],
            "name": c["properties"]["name"],
            "placename": c_name_cn
        })
        print(cnt, '\t', c["properties"]["name"], ' ' *
              (40 - len(c["properties"]["name"])), c_name_cn)
        time.sleep(0.1)
        cnt += 1
    f.close()

    with open(output_name, "w", encoding='utf-8') as output:
        output_str = json.dumps(c_info).encode(
            'utf-8').decode('unicode_escape')
        output_str.replace('[', '[\n\t')
        output_str.replace(' {"pid":', '\n\t{"pid":')
        output_str.replace(']', '\n]')
        output.write(output_str)
        output.close()
