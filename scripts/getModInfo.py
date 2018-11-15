#!/usr/bin/python3

import sys
import requests
from lxml import html
import datetime

modid = sys.argv
if len(modid)!=2:
	print("Invalid argument.")
else:
	modid = modid[1]
	url = "https://steamcommunity.com/sharedfiles/filedetails/?id=" + str(modid)
	page = requests.get(url)
	tree = html.fromstring(page.content)
	game = tree.xpath('//div[@class="apphub_AppName ellipsis"]/text()')
	if game[0]!="Arma 3":
		print("Not an Arma 3 mod ID.")
	else:
		latest_update = tree.xpath('//div[@class="detailsStatRight"]/text()')
		title = tree.xpath('//div[@class="workshopItemTitle"]/text()')
		release_date = latest_update[1]
		if (len(latest_update)<3):
			latest_update = release_date
		else:
			latest_update = latest_update[2]
		title = title[0]
		if (len(latest_update)<18):
			datetime_update = datetime.datetime.strptime(latest_update, '%d %b @ %I:%M%p')
			datetime_update = datetime_update.replace(year=datetime.datetime.now().year)
		else:
			datetime_update = datetime.datetime.strptime(latest_update, '%d %b, %Y @ %I:%M%p')
		modinfo = [modid, title, datetime_update.strftime("%Y-%m-%d %H:%M:%S")]
		print(modinfo[0]+","+modinfo[1]+","+modinfo[2])