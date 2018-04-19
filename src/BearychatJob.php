<?php


namespace Cblink\BearychatException;


use ElfSundae\BearyChat\Laravel\BearyChat;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class BearychatJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    /**
     * @var
     */
    private $message;
    /**
     * @var
     */
    private $code;
    /**
     * @var
     */
    private $file;
    /**
     * @var
     */
    private $line;
    /**
     * @var
     */
    private $url;
    /**
     * @var
     */
    private $trace;

    /**
     * Create a new job instance.
     *
     * @param $url
     * @param $message
     * @param $code
     * @param $file
     * @param $line
     * @param $trace
     */
    public function __construct($url, $message, $code, $file, $line, $trace)
    {
        $this->message = $message;
        $this->code = $code;
        $this->file = $file;
        $this->line = $line;
        $this->url = $url;
        $this->trace = $trace;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $message = [
            'Environment:' . config('app.env'),
            'Project Name:' . config('app.name'),
            'Url:' . $this->url,
            'Exception Message:' . $this->message,
            'Exception Code:' . $this->code,
            'Exception File:' . $this->file,
            'Exception Line:' . $this->line,
            'Exception Trace:' . $this->trace,
        ];
//
        BearyChat::send(implode(PHP_EOL, $message));
    }
}
