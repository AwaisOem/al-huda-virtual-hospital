<?php require_once "components/header_view.php"; ?>
<?php require_once "components/dash_top_view.php" ?>
<!-- pages -->
<section class="videoCall flex flex-col h-full w-full gap-5 relative">
    <style>
        .videos {
            -webkit-transform: scaleX(-1);
            transform: scaleX(-1);
            overflow: hidden;

        }
    </style>
    <video class="videos rounded-lg w-full min-h-full bg-stone-800" id="remoteVid" autoplay playsinline></video>
    <video class="videos absolute bottom-20 right-5 md:w-80 md:h-40 w-20 h-40 bg-stone-700 rounded-lg" id="localVid" autoplay playsinline></video>
    <div class="absolute flex flex-row justify-center items-center gap-5 bg-stone-600 rounded-lg w-full h-16 bottom-0 left-0">
        <button type="button" id="Create" class=" h-8 border-0 outline-0 px-4 py-2 flex gap-2 text-white items-center cursor-pointer bg-gradient-to-tr from-blue-600 to-blue-400 rounded-lg">
            <i class="fa-solid fa-plus"></i>
            <span class="hidden sm:block">Create</span>
        </button>
        <button type="button" id="Dail" class=" h-8 border-0 outline-0 px-4 py-2 flex gap-2 text-white items-center cursor-pointer bg-gradient-to-tr from-green-600 to-green-400 rounded-lg">
            <i  class="fa-solid fa-phone"></i>
            <span class="hidden sm:block">Call</span>
        </button>
        <button type="button" id="VoiceToggle" class="h-8 border-0 outline-0 px-4 py-2 flex gap-2 text-white items-center cursor-pointer bg-red-600 rounded-lg">
            <i id="voiceicn" class="fa-solid fa-microphone-slash"></i>
            <span class="hidden sm:block">Mute</span>
        </button>
        <button type="button" id="CameraToggle" class=" h-8 border-0 outline-0 px-4 py-2 flex gap-2 text-white items-center cursor-pointer bg-red-600 rounded-lg">
            <i id="vidicn" class="fa-solid fa-video-slash"></i>
            <span class="hidden sm:block">Camera</span>
        </button>
        <button type="button" id="Hangup" class="HangupP h-8 border-0 outline-0 px-4 py-2 flex gap-2 text-white items-center cursor-pointer bg-gradient-to-tr from-red-600 to-red-400 rounded-lg">

            <i class="fa-solid fa-phone-slash"></i>
            
            <span class="hidden sm:block">Hang</span>
        </button>
    </div>
</section>
<script src="assets/agora-sdk.js"></script>
<script defer>
    class VideoCall {
        constructor(roomId) {
            this.roomId = roomId;
            this.peerConnection = null;
            this.localStream = null;
            this.remoteStream = null;
            this.servers = {
                iceServers: [{
                    urls: ['stun:stun1.l.google.com:19302', 'stun:stun2.l.google.com:19302']
                }]
            }
            this.client = null;
            this.token = null;
            this.uid = String(Math.floor(Math.random() * 10000));
            this.channel = null;
            this.constraints = {
                video: {
                    width: {
                        min: 640,
                        ideal: window.innerWidth,
                        max: 1920
                    },
                    height: {
                        min: 480,
                        ideal: window.innerHeight,
                        max: 1080
                    },
                },
                audio: true
            }
            this.APP_ID = '<agora_app_id>'
        }
        async init() {
            this.client = await AgoraRTM.createInstance(this.APP_ID)
            await this.client.login({
                uid: this.uid,
                token: this.token
            })
            this.channel = this.client.createChannel(this.roomId)
            await this.channel.join()

            this.channel.on('MemberJoined', this.createOffer.bind(this))
            this.channel.on('MemberLeft', this.handleUserLeft.bind(this))
            this.client.on('MessageFromPeer', this.handleMessageFromPeer.bind(this))

            this.localStream = await navigator.mediaDevices.getUserMedia(this.constraints)
            document.getElementById('localVid').srcObject = this.localStream
        }
        async leaveChannel() {
            await this.channel.leave()
            await this.client.logout()
        }
        toggleCamera() {
            let videoTrack = this.localStream.getTracks().find(track => track.kind === 'video')

            if (videoTrack.enabled) {
                videoTrack.enabled = false
                $('#CameraToggle').removeClass('bg-red-600').addClass('bg-violet-600')
                $('#vidicn').removeClass('fa-video-slash')
                $('#vidicn').addClass('fa-video')
            } else {
                videoTrack.enabled = true
                $('#CameraToggle').removeClass('bg-violet-600').addClass('bg-red-600')
                $('#vidicn').removeClass('fa-video')
                $('#vidicn').addClass('fa-video-slash')
            }
        }
        toggleMic() {
            let audioTrack = this.localStream.getTracks().find(track => track.kind === 'audio')

            if (audioTrack.enabled) {
                audioTrack.enabled = false
                $('#VoiceToggle').removeClass('bg-red-600').addClass('bg-violet-600')
                $('#voiceicn').removeClass('fa-microphone-slash')
                $('#voiceicn').addClass('fa-microphone')
            } else {
                audioTrack.enabled = true
                $('#VoiceToggle').removeClass('bg-violet-600').addClass('bg-red-600')
                $('#voiceicn').removeClass('fa-microphone')
                $('#voiceicn').addClass('fa-microphone-slash')
            }
        }
        async addAnswer(answer) {
            if (!this.peerConnection.currentRemoteDescription) {
                this.peerConnection.setRemoteDescription(answer)
            }
        }




        async handleUserLeft(MemberId) {
            //UI UPDATE
            document.getElementById('remoteVid').srcObject = null
        }

        async handleMessageFromPeer(message, MemberId) {

            message = JSON.parse(message.text)

            if (message.type === 'offer') {
                this.createAnswer(MemberId, message.offer)
            }

            if (message.type === 'answer') {
                this.addAnswer(message.answer)
            }

            if (message.type === 'candidate') {
                if (this.peerConnection) {
                    this.peerConnection.addIceCandidate(message.candidate)
                }
            }
        }

        async createPC(MemberId) {
            this.peerConnection = new RTCPeerConnection(this.servers)

            this.remoteStream = new MediaStream()
            document.getElementById('remoteVid').srcObject = this.remoteStream
            if (!this.localStream) {
                this.localStream = await navigator.mediaDevices.getUserMedia({
                    video: true,
                    audio: false
                })
                document.getElementById('localVid').srcObject = this.localStream
            }

            this.localStream.getTracks().forEach((track) => {
                this.peerConnection.addTrack(track, this.localStream)
            })

            this.peerConnection.ontrack = (event) => {
                event.streams[0].getTracks().forEach((track) => {
                    this.remoteStream.addTrack(track)
                })
            }

            this.peerConnection.onicecandidate = async (event) => {
                if (event.candidate) {
                    this.client.sendMessageToPeer({
                        text: JSON.stringify({
                            'type': 'candidate',
                            'candidate': event.candidate
                        })
                    }, MemberId)
                }
            }
        }
        async createOffer(MemberId) {
            await this.createPC(MemberId)

            let offer = await this.peerConnection.createOffer()
            await this.peerConnection.setLocalDescription(offer)

            this.client.sendMessageToPeer({
                text: JSON.stringify({
                    'type': 'offer',
                    'offer': offer
                })
            }, MemberId)
        }


        async createAnswer(MemberId, offer) {
            await this.createPC(MemberId)

            await this.peerConnection.setRemoteDescription(offer)

            let answer = await this.peerConnection.createAnswer()
            await this.peerConnection.setLocalDescription(answer)

            this.client.sendMessageToPeer({
                text: JSON.stringify({
                    'type': 'answer',
                    'answer': answer
                })
            }, MemberId)
        }

    };

    function initVideoSession(roomId) {
        if(!roomId) return;
        let videoCall = new VideoCall(roomId);
        videoCall.init();
        $('#Hangup').click(function() {
            videoCall.leaveChannel();
            window.location.href = '/vidcall'
        })
        $('#CameraToggle').click(function() {
            videoCall.toggleCamera();
        })
        $('#VoiceToggle').click(function() {
            videoCall.toggleMic();
        })
        window.addEventListener('beforeunload', videoCall.leaveChannel);
    }
    $('#Dail').click(function() {
        let urlParams = new URLSearchParams(window.location.search)
        let roomId = urlParams.get('room');
        initVideoSession(roomId);
    })
    $('#Create').click(function() {
            Swal.fire({
                'icon': 'warning',
                title: "Enter a call ID",
                input: 'text',
                inputPlaceholder: "Enter a call ID",
                confirmButtonText: "Join",
                preConfirm: (result) => {
                    if (!result) {
                        Swal.showValidationMessage("Room ID is required")
                    }
                    return result;
                },
                showLoaderOnConfirm: true,
                showCancelButton: true
            }).then((result) => {
                if (result.isConfirmed) {
                    if (history.pushState) {
                        let searchParams = new URLSearchParams(window.location.search);
                        searchParams.set('room', result.value);
                        let newurl = window.location.protocol + "//" + window.location.host + window.location.pathname + '?' + searchParams.toString();
                        window.history.pushState({path: newurl}, '', newurl);
                    }else{
                        window.location.search = '?room='+result.value;
                    }      
                }
            })
    })
</script>
<?php require_once "components/dash_bottom_view.php" ?>
<?php require_once "components/footer_view.php"; ?>