vartsstart=0
vartsstop=0
filepath="/opt/ts3server/ts3server_startscript.sh"
while :
do 
	tsstart=$(mysql -N -B html<<<"SELECT tsstart FROM tsstart")
	if [[ $tsstart == "1" ]]
	then
	if [[ $vartsstart == "0" ]]
	then
	vartsstart=1
	vartsstop=0
	su - teamspeak3 -c " $filepath start"
	fi
	fi

	tsstop=$(mysql -N -B html<<<"SELECT tsstop FROM tsstart")
	if [[ $tsstop == "1" ]]
	then

	if [[ $vartsstop == "0" ]]
	then

	vartsstop=1
	vartsstart=0
	su - teamspeak3 -c "$filepath stop"
	fi
	fi
sleep 1

done
