echo "time: " $(date +"%Y-%m-%d %H:%M:%S")
cd `dirname $0`; python3 covid_spider.py
